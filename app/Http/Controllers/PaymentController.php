<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Payment;
use App\Admin\Shop;
use App\Admin\Supplier;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
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
        $supplier = Payment::where('payments.shop', Auth::user()->id)
                ->join('suppliers','payments.supplier','suppliers.id')
                ->select('suppliers.id','suppliers.name')
                ->get();
        $supplie = Supplier::where('status', 1)->where('shop', Auth::user()->id)->get();
        $data = Payment::orderBy('payments.id', 'DESC')
                ->where('payments.shop', Auth::user()->id)
                ->where('payments.due', '!=', '0')
                ->leftJoin('suppliers','payments.supplier','suppliers.id')
                ->leftJoin('purchase_cancels','payments.purchase_no','purchase_cancels.purchase_no')
                ->select('payments.*','suppliers.name as supplie')
                ->where('purchase_cancels.purchase_no', null)
                ->get();
        return view('Admin.Payment.payment', compact('today','data','supplier','supplie'));
    }

    public function store(Request $request)
    {
        $data = new Payment();
        $data->date = $request->date;
        $data->supplier = $request->supplier;
        $data->purchase_no = $request->purchase_no;
        $data->paid = $request->paid;
        $data->due = $request->due;
        $data->amount = $request->amount;
        $data->details = $request->details;
        $data->shop = Auth::user()->id;
        $data->user = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Payment Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Payment::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $paid = $request->paid + $request->amount;
        $due = $request->due - $request->amount;
        Payment::where('id',$request->id)
            ->update([  
                        'date'      => $request->date,  
                        'paid'      => $paid,  
                        'due'       => $due,  
                        'amount'    => $request->amount,  
                        'details'   => $request->details,  
                    ]);
        return redirect()->back()->with('message','Payment Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Payment::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Payment Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Payment::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Payment Deleted Successfully');
    }

    public function datewise_report(Request $request)
    {
        $request->session()->flush();
        $supli = Supplier::where('shop', Auth::user()->id)->get();
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->supplier) {  
            $supplier = $request->supplier; 
        } else { 
            $supplier = 'All';
        }
        if ($request->todate) {  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        if ($supplier == 'All') {  
            $payment = Payment::orderBy('payments.id', 'DESC')
                        ->where('payments.shop', Auth::user()->id)
                        ->whereBetween('payments.date', [$fromdate, $todate])
                        ->leftJoin('suppliers','payments.supplier','suppliers.id')
                        ->select('payments.*','suppliers.name as suppli')
                        ->get();
            Session::put('supli', $supplier);
            Session::put('supplier', $supplier);
        }
        elseif ($supplier == 'Cash') {  
            $payment = Payment::orderBy('payments.id', 'DESC')
                        ->where('payments.shop', Auth::user()->id)
                        ->where('payments.supplier', $supplier)
                        ->whereBetween('payments.date', [$fromdate, $todate])
                        ->leftJoin('suppliers','payments.supplier','suppliers.id')
                        ->select('payments.*','suppliers.name as suppli')
                        ->get();
            Session::put('supli', $supplier);
            Session::put('supplier', $supplier);
        } else { 
            $payment = Payment::orderBy('payments.id', 'DESC')
                        ->where('payments.supplier', $supplier)
                        ->where('payments.shop', Auth::user()->id)
                        ->whereBetween('payments.date', [$fromdate, $todate])
                        ->leftJoin('suppliers','payments.supplier','suppliers.id')
                        ->select('payments.*','suppliers.name as suppli')
                        ->get();
            $sup = Supplier::where('id', $supplier)->first();
            Session::put('supplier', $sup->name);
            Session::put('supli', $supplier);
        }
        $Paid   = $payment->sum('paid');
        $Due    = $payment->sum('due');
        $Amou   = $payment->sum('amount');

        Session::put('fromdate', $fromdate);
        Session::put('todate', $todate);
        return view('Admin.Payment.datewise_report', 
                compact('supli','payment','fromdate','todate','supplier','Paid','Due','Amou'));
    }

    public function datewise_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $supli      = Session::get('supli');
        $supplier   = Session::get('supplier');
        $fromdate   = Session::get('fromdate');
        $todate     = Session::get('todate');
        if ($supli == 'All') {  
            $payment = Payment::orderBy('payments.id', 'DESC')
                        ->where('payments.shop', Auth::user()->id)
                        ->whereBetween('payments.date', [$fromdate, $todate])
                        ->leftJoin('suppliers','payments.supplier','suppliers.id')
                        ->select('payments.*','suppliers.name as suppli')
                        ->get();
        } else { 
            $payment = Payment::orderBy('payments.id', 'DESC')
                        ->where('payments.supplier', $supli)
                        ->where('payments.shop', Auth::user()->id)
                        ->whereBetween('payments.date', [$fromdate, $todate])
                        ->leftJoin('suppliers','payments.supplier','suppliers.id')
                        ->select('payments.*','suppliers.name as suppli')
                        ->get();
        }
        $Paid   = $payment->sum('paid');
        $Due    = $payment->sum('due');
        $Amou   = $payment->sum('amount');
        return view('Admin.Payment.datewise_print', 
            compact('company','supli','payment','fromdate','todate','supplier','Paid','Due','Amou'));
    }

}
