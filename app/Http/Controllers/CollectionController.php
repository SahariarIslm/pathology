<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Collection;
use App\Admin\Customer;
use Illuminate\Support\Facades\Auth;
use App\Admin\Sale;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:admin');
    }

    public function index()
    {
        $today = date('Y-m-d');
        $customer = Collection::orderBy('collections.id', 'DESC')
                ->where('collections.shop', Auth::user()->id)
                ->join('customers','collections.customer','customers.id')
                ->select('customers.id','customers.name')
                ->get();
        $custome = Customer::where('status', 1)
                ->where('shop', Auth::user()->id)
                ->get();
        $data = Collection::orderBy('collections.id', 'DESC')
                ->where('collections.shop', Auth::user()->id)
                ->where('collections.due', '!=', '0')
                ->leftJoin('customers','collections.customer','customers.id')
                ->leftJoin('deliveries','collections.delivery','deliveries.id')
                ->leftJoin('sale_cancels','collections.invoice','sale_cancels.sale_no')
                ->select('collections.*','customers.name as custo','deliveries.name as deliver')
                ->where('sale_cancels.sale_no', null)
                ->get();
        return view('Admin.Collection.collection', compact('today','data','customer','custome'));
    }

    public function customer_invoice($id)
    {
        $data = Sale::where('sales.customer', $id)
                    ->where('sales.due', '!=' ,'0')
                    ->where('collections.invoice', null)
                    ->leftJoin('collections','sales.sale_no','collections.invoice')
                    ->select('sales.sale_no')
                    ->pluck('sale_no');
        return response()->json($data);
    }
    public function customer_due(Request $request)
    {
        $data = Sale::where('sale_no', $request->id)->get();
        return response()->json($data);
    }

    public function customer_find(Request $request)
    {
        $data = Collection::where('customer', $request->id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data           = new Collection();
        $data->date     = $request->date;
        $data->customer = $request->customer;
        $data->delivery = $request->delivery;
        $data->invoice  = $request->invoice;
        $data->paid     = $request->paid + $request->amount;
        $data->due      = $request->due;
        $data->amount   = $request->amount;
        $data->details  = $request->details;
        $data->shop     = Auth::user()->id;
        $data->user     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Collection Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Collection::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $paid   = $request->paid + $request->amount;
        $due    = $request->due - $request->amount;
        Collection::where('id',$request->id)
                ->update([  
                        'date'      => $request->date,  
                        'paid'      => $paid,  
                        'due'       => $due,  
                        'amount'    => $request->amount,  
                        'details'   => $request->details,  
                    ]);
        return redirect()->back()->with('message','Collection Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Collection::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else {   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Collection Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Collection::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Collection Deleted Successfully');
    }

}
