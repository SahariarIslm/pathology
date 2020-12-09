<?php

namespace App\Http\Controllers;

use App\Admin\Payment;
use Illuminate\Http\Request;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use App\Admin\Customer;
use App\Admin\PatientReference;
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
        if ($last = Purchase::all()->last()){  
            $sl = $last->id; 
        } else { 
            $sl = 0; 
        }
        $reference = PatientReference::orderBy('id','DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $patient = Customer::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $tests = Product::orderBy('name','ASC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        return view('Admin.Purchase.purchase', compact('sl','patient','reference','tests'));
    }

    public function clientinfo(){
        $clientInfo = Customer::where('status',1)
                                ->where('id',request()->patient)
                                ->where('shop', Auth::user()->id)
                                 ->first();
        return response()->json([
                'clientInfo'=> $clientInfo
            ]);
    }

    public function getTests(){
        $test = Product::where('status',1)
                        ->where('id',request()->test_id)
                        ->get();
        return response()->json([
            'test'=> $test
        ]);
    }

    public function details(Request $request)
    {
        $data = Supplier::where('id', $request->id)->pluck('mobile');
        return response()->json($data);
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
