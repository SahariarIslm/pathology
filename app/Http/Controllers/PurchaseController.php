<?php

namespace App\Http\Controllers;

use App\Admin\Payment;
use Illuminate\Http\Request;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use App\Admin\Supplier;
use Illuminate\Support\Facades\Auth;
use App\Admin\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function index(Request $request)
    {
        // $request->session()->flush();
        if ($last = Purchase::all()->last()){  
            $sl = $last->id; 
        } else { 
            $sl = 0; 
        }
        $suppliers = Supplier::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $product = Product::orderBy('products.id', 'DESC')
                ->where('products.shop', Auth::user()->id)
                ->where('products.status', 1)
                ->get();
        return view('Admin.Purchase.purchase', compact('suppliers','sl','product'));
    }

    // public function subCat(Request $request)
    // {
         
    //     $manufacturer = $request->manufacturer;
         
    //     $medicines = Product::where('manufacturer',$manufacturer)
    //                         ->get();
    //     return response()->json([
    //         'subcategories' => $subcategories
    //     ]);
    // }

    public function getMedicine(){
        $medicines = Product::where('status',1)
                                ->where('manufacturer',request()->manufacturer)
                                 ->get();
        $medicines_html = (string)view('Admin.components.medicines_html', 
                            [
                                'medicines' => $medicines,
                            ]
                        );
        return response()->json([
            'medicines_html'=> $medicines_html

        ]);
    }

    public function details(Request $request)
    {
        $data = Supplier::where('id', $request->id)->pluck('mobile');
        return response()->json($data);
    }

    public function add_item(Request $request)
    {
        $today = date('Y-m-d');
        $products = Product::find($request->id);
        // \Cart::session(Auth::user()->id)->add(array(
        \Cart::add(array(
            'id'         => $products->id, 
            'name'       => $products->name,
            'price'      => '',
            'quantity'   => 1,
            'attributes' => array(
                'minimum'       => $products->stock,
                'unit'          => $products->unit,
                'code'          => $products->barcode,
                'price'         => $products->price,
                'expiry_date'   => null,
                'batch_no'      => null,
              )
        ));
        $msg = "Product Added to Cart Successfully ....";
        // Session::put('msg',$msg);
        $request->session()->flash('status', $msg);
    }

    public function add_expiry(Request $request)
    {
        $products = \Cart::get($request->id);
        \Cart::update($request->id, array(
            'attributes' => array(
                'minimum'       => $products->attributes->minimum,
                'unit'          => $products->attributes->unit,
                'code'          => $products->attributes->code,
                'price'         => $products->attributes->price,
                'batch_no'      => $products->attributes->batch_no,
                'expiry_date'   => $request->expiry,
            ),
        ));
        $msg = "Expiry Date Updated Successfully ....";
        $request->session()->flash('status', $msg);
    }

    public function add_batch(Request $request)
    {
        // Cart::session($userId)->get($itemId)
        $products = \Cart::get($request->id);
        \Cart::update($request->id, array(
            'attributes' => array(
                'minimum'       => $products->attributes->minimum,
                'unit'          => $products->attributes->unit,
                'code'          => $products->attributes->code,
                'price'         => $products->attributes->price,
                'expiry_date'   => $products->attributes->expiry_date,
                'batch_no'      => $request->batch,
            ),
        ));
        $msg = "Batch No Updated Successfully ....";
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
        return redirect()->back()->with('danger','All Products Cleared from Cart...');
    }

    public function item_save(Request $request)
    {
        $data                   = new Purchase();
        $data->purchase_no      = $request->input('purchase_no');
        $data->supplier         = $request->input('supplier');
        $data->date             = $request->date;
        $data->totalQty         = $request->totalQty;
        $data->subTotal         = $request->subTotal;
        $data->discount         = $request->discount;
        $data->d_type           = $request->d_type;
        $data->payable          = $request->payable;
        $data->paid             = $request->paid;
        $data->return           = $request->return;
        $data->due              = $request->due;
        $data->p_type           = $request->p_type;
        $data->shop             = Auth::user()->id;
        $data->user             = Auth::user()->id;
        $data->save();

        if($request->due != '0')
        {
            $data               = new Payment();
            $data->date         = $request->date;
            $data->supplier     = $request->supplier;
            $data->purchase_no  = $request->purchase_no;
            $data->paid         = $request->paid;
            $data->due          = $request->due;
            $data->amount       = '0';
            $data->shop         = Auth::user()->id;
            $data->user         = Auth::user()->id;
            $data->save();
        }

        foreach (\Cart::getContent() as $item) 
        {
            $mdata = array(
                    'name'          => $item->name,
                    'code'          => $item->attributes->code,
                    'purchase_no'   => $request->purchase_no,
                    'date'          => $request->date,
                    'expiry_date'   => $item->attributes->expiry_date,
                    'batch_no'      => $item->attributes->batch_no,
                    'qty'           => $item->quantity,
                    'cost'          => $item->price,
                    'total'         => $item->getPriceSum(),
                    'shop'          => Auth::user()->id,
                    'user'          => Auth::user()->id,
            );
            $insert = DB::table('purchase_items')->insert($mdata);

            $stdata = array(
                    'code'      => $item->attributes->code,
                    'name'      => $item->name,
                    'quantity'  => $item->quantity,
                    'cost'      => $item->price,
                    'price'     => $item->attributes->price,
                    'minimum'   => $item->attributes->minimum,
                    'unit'      => $item->attributes->unit,
                    'user'      => Auth::user()->id,
                    'shop'      => Auth::user()->id,
            );
            $exist = DB::table('stocks')
                        ->where('code', $item->attributes->code)
                        ->first();
        
            if($exist == null)//if doesn't exist: create
            {
                $insert = DB::table('stocks')->insert($stdata);
            }
            else //if exist: update
            {
                //if purchase cost is same as stock cost
                if($exist->cost == $item->price)
                {
                    $update = DB::table('stocks')
                                ->where('code', $item->attributes->code)
                                ->increment('quantity', $item->quantity);
                }
                //if purchase cost is not same as stock cost
                else 
                {
                    $newCost = ($exist->cost + $item->price) / 2;
                    $update = DB::table('stocks')
                                ->where('code', $item->attributes->code)
                                ->increment('quantity', $item->quantity);
                    $update = DB::table('stocks')
                                ->where('code', $item->attributes->code)
                                ->update(['cost' => $newCost]);
                }
            }
        }
        \Cart::clear();
        $msg = 'Products Purchased Successfully !!';
        $request->session()->flash('message', $msg);
        // return redirect()->back(); 
    }

}
