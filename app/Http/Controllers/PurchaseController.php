<?php

namespace App\Http\Controllers;

use App\Admin\Payment;
use Illuminate\Http\Request;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use App\Admin\Customer;
use App\Admin\Sale;
use App\Admin\PatientReference;
use Illuminate\Support\Facades\Auth;
use App\Admin\Product;
use App\Admin\SaleItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function index(Request $request){
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
        return view('Admin.Purchase.purchase', compact('sl','patient','reference','tests','saleNo','tata'));
    }

    public function clientinfo(){
        
        $clientInfo = Customer::where('customers.id',request()->patient)->where('customers.shop', Auth::user()->id)
                    ->leftJoin('patient_references','customers.reference_id','=','patient_references.id')
                    ->select('customers.*','patient_references.discount as r_discount')
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

    public function details(Request $request){
        $data = Supplier::where('id', $request->id)->pluck('mobile');
        return response()->json($data);
    }

    public function item_save(Request $request){
        
        $data               = new Sale();
        $data->sale_no      = $request->sale_no;
        $data->patient_id   = $request->patient_id;
        $data->reference_id   = $request->reference_id;
        $data->date         = $request->date;
        $data->totalQty     = $request->totalQty;
        $data->subTotal     = $request->subTotal;
        $data->discount     = $request->discount;
        $data->d_type       = $request->d_type;
        $data->payable      = $request->payable;
        $data->paid         = $request->paid;
        $data->commission   = $request->commission;
        $data->return       = $request->return;
        $data->due          = $request->due;
        $data->shop         = Auth::user()->id;
        $data->user         = Auth::user()->name;
        $data->save();

        $countProduct = count($request->test_id);

        if($request->test_id){
            $postData = [];
            for ($i=0; $i <$countProduct ; $i++) { 
                $name = Product::find($request->test_id[$i])->name;
                $room = Product::find($request->test_id[$i])->room;
                $postData[] = [
                'name'          => $name,
                'code'          => $request->code[$i],
                'sale_no'       => $request->sale_no,
                'date'          => $request->date,
                'room'          => $room,
                'qty'           => $request->qty[$i],
                'price'         => $request->mrp[$i],
                'total'         => $request->total[$i],
                'shop'          => Auth::user()->id,
                'user'          => Auth::user()->id,
                ];
            }                
            SaleItem::insert($postData);
        }

        $msg = 'Services Sold Successfully !!';
        $request->session()->flash('message', $msg);
        return redirect()->back();
    }

}
