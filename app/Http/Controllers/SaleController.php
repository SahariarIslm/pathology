<?php

namespace App\Http\Controllers;

use App\Admin\Collection;
use Illuminate\Http\Request;
use App\Admin\Product;
use App\Admin\Sale;
use App\Admin\SaleItem;
use Illuminate\Support\Facades\DB;
use App\Admin\Customer;
use App\Admin\Delivery;
use App\Admin\Shop;
use Illuminate\Support\Facades\Auth;
use App\Admin\Stock;
use DateTime;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function index(Request $request)
    {
        // $request->session()->flush();
        $date = new DateTime("now");
        if ($last = Sale::all()->last()){  
            $sl = $last->id; 
        } else { 
            $sl = 0; 
        }
        $si = 'INV';
        $s = $sl + 1 ;
        $data = Auth::user()->id . $date->format('Y') . $s ;
        $tata = $si . $data;

        $saleNo = 'INV'. Auth::user()->id . $date->format('Y') . $sl ;

        $delivery = Delivery::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $customers = Customer::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $product = Stock::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('quantity', '!=', 0)
                ->get();
        return view('Admin.Sale.sale', compact('delivery','customers','sl','product','saleNo','tata'));
    }

    public function details(Request $request)
    {
        $data = Customer::where('id', $request->id)->pluck('mobile');
        return response()->json($data);
    }

    public function add_item(Request $request)
    {
        $products = Stock::find($request->id);
        // \Cart::session(Auth::user()->id)->add(array(
        \Cart::add(array(
            'id' => $products->id, 
            'name' => $products->name,
            'price' => $products->price,
            'quantity' => 1,
            'attributes' => array(
                'code' => $products->code,
                'unit' => $products->unit,
                'cost' => $products->cost
              )
        ));
        $msg = "Product Added to Cart Successfully ....";
        $request->session()->flash('status', $msg);
    }

    public function add_qty(Request $request)
    {
        \Cart::update($request->id, array(
            // 'quantity' => $request->qty
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));
        $msg = "Quantity Updated Successfully ....";
        $request->session()->flash('status', $msg);
    }
    public function add_price(Request $request)
    {
        \Cart::update($request->id, array(
            'price' => $request->price
        ));
        $msg = "Price Updated Successfully ....";
        $request->session()->flash('message', $msg);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('warning','Product Removed from Cart...');
    }

    public function clean()
    {
        \Cart::clear();
        return redirect()->back()->with('danger','All Products Cleared from Cart ...');
    }

    public function item_save(Request $request)
    {
        $data               = new Sale();
        $data->sale_no      = $request->sale_no;
        $data->customer     = $request->customer;
        $data->delivery     = $request->delivery;
        $data->date         = $request->date;
        $data->totalQty     = $request->totalQty;
        $data->subTotal     = $request->subTotal;
        $data->discount     = $request->discount;
        $data->d_type       = $request->d_type;
        $data->dCharge      = $request->dCharge;
        $data->payable      = $request->payable;
        $data->paid         = $request->paid;
        $data->return       = $request->return;
        $data->due          = $request->due;
        $data->p_type       = $request->p_type;
        $data->shop         = Auth::user()->id;
        $data->user         = Auth::user()->name;
        $data->save();

        $saleNo = $data->sale_no;

        foreach (\Cart::getContent() as $item) {
            $mdata = array(
                'name'      => $item->name,
                'code'      => $item->attributes->code,
                'sale_no'   => $request->sale_no,
                'date'      => $request->date,
                'qty'       => $item->quantity,
                // 'cost'      => $item->attributes->cost,
                'price'     => $item->price,
                // 'tCost'     => $item->quantity * $item->attributes->cost,
                'total'     => $item->getPriceSum(),
                'shop'      => Auth::user()->id,
                'user'      => Auth::user()->id,
            );
            $insert = DB::table('sale_items')->insert($mdata);
            $update = DB::table('stocks')
                    ->where('code', $item->attributes->code)
                    ->decrement('quantity', $item->quantity);
        }
        \Cart::clear();

        if($request->due != '0')
        {
            $data           = new Collection();
            $data->date     = $request->date;
            $data->customer = $request->customer;
            $data->delivery = $request->delivery;
            $data->invoice  = $request->sale_no;
            $data->paid     = $request->paid;
            $data->due      = $request->due;
            $data->amount   = '0';
            $data->shop     = Auth::user()->id;
            $data->user     = Auth::user()->id;
            $data->save();
        }
        $msg = 'Products Sale Successful !!';
        $request->session()->flash('message', $msg);
        
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data = Sale::where('sale_no', $request->sale_no)
                    ->join('users','sales.shop','users.id')
                    ->join('customers','sales.customer','customers.id')
                    ->select('sales.*','customers.name as custom','customers.mobile as mobil')
                    ->get();
        $details = SaleItem::where('sale_no', $saleNo)->get();
        // return view('Admin.Report.Sale.saleinvoicePrint', compact('data','details'));
        return redirect()->back();
    }

}
