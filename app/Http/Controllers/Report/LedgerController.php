<?php

namespace App\Http\Controllers\Report;

use App\Admin\Collection;
use App\Admin\Customer;
use App\Admin\Expense;
use App\Admin\Payment;
use App\Admin\Shop;
use App\Admin\Supplier;
use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LedgerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function customer_ledger(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $customer = $request->customer; 
        
        $customers = Customer::orderBy('id', 'DESC')->where('shop', Auth::user()->id)->get();

        $debit = DB::table('sales')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('customer', $customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tDebit = $debit->sum('payable');

        $credT = DB::table('sale_cancels')
                    ->whereBetween('s_date', [$fromdate, $todate])
                    ->where('customer', $customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tcredT = $credT->sum('subTotal');

        $credit = DB::table('collections')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('customer', $customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tCredit = $credit->sum('paid');

        $newCre = $tcredT + $tCredit;
        $tBalance = $tDebit - $newCre;

        return view('Admin.Report.Ledger.customer_ledger', compact('fromdate','todate',
            'customer','customers','debit','credT','credit','tDebit','tCredit','newCre','tBalance'));
    }

    public function customer_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        
        $data = Customer::find($request->customer);
        $customer = $data->name;
        $mobile = $data->mobile;

        $debit = DB::table('sales')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('customer', $request->customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tDebit = $debit->sum('payable');

        $credT = DB::table('sale_cancels')
                    ->whereBetween('s_date', [$fromdate, $todate])
                    ->where('customer', $request->customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tcredT = $credT->sum('subTotal');

        $credit = DB::table('collections')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('customer', $request->customer)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tCredit = $credit->sum('paid');

        $newCre = $tcredT + $tCredit;
        $tBalance = $tDebit - $newCre;

        return view('Admin.Report.Ledger.customer_print', compact('fromdate','todate','company',
            'customer','mobile','debit','credit','tDebit','credT','tCredit','newCre','tBalance'));
    }

    public function supplier_ledger(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $supplier = $request->supplier; 
        
        $suppliers = Supplier::orderBy('id', 'DESC')
                            ->where('shop', Auth::user()->id)
                            ->get();

        // $supplieR = Supplier::where('id',$supplier)->first();
        // $supplier_name = $supplieR->name; 

        $debit = DB::table('purchases')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('supplier', $supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tDebit = $debit->sum('payable');

        $credT = DB::table('purchase_cancels')
                    ->whereBetween('p_date', [$fromdate, $todate])
                    ->where('supplier', $supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tcredT = $credT->sum('subTotal');

        $credit = DB::table('payments')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('supplier', $supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tCredit = $credit->sum('paid');

        $newCre = $tcredT + $tCredit;

        $tBalance = $tDebit - $newCre;

        return view('Admin.Report.Ledger.supplier_ledger', 
            compact('fromdate','todate','supplier','suppliers','debit','credT',
                    'credit','tDebit','tCredit','newCre','tBalance'));
    }

    public function supplier_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        
        $data = Supplier::find($request->supplier);
        $supplier = $data->name;
        $mobile = $data->mobile;

        $debit = DB::table('purchases')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('supplier', $request->supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tDebit = $debit->sum('payable');

        $credT = DB::table('purchase_cancels')
                    ->whereBetween('p_date', [$fromdate, $todate])
                    ->where('supplier', $request->supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tcredT = $credT->sum('subTotal');

        $credit = DB::table('payments')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('supplier', $request->supplier)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tCredit = $credit->sum('paid');

        $newCre = $tcredT + $tCredit;

        $tBalance = $tDebit - $newCre;

        return view('Admin.Report.Ledger.supplier_print', compact('fromdate','todate','company',
            'supplier','mobile','debit','credT','credit','tDebit','newCre','tCredit','tBalance'));
    }

    public function due_customer_report(Request $request)
    {
        $request->session()->flush();
        $collection = Collection::orderBy('collections.id', 'DESC')
                                ->where('collections.shop', Auth::user()->id)
                                ->where('collections.due', '!=', '0')
                                ->leftJoin('customers','collections.customer','customers.id')
                                ->leftJoin('sale_cancels','collections.invoice','sale_cancels.sale_no')
                                ->select('collections.*','customers.name')
                                ->where('sale_cancels.sale_no', null)
                                ->get();
        $Paid   = $collection->sum('paid');
        $Due    = $collection->sum('due');
        $Amou   = $collection->sum('amount');
        return view('Admin.Report.Due.due_customer_report', 
            compact('collection','Paid','Due','Amou'));
    }

    public function due_customer_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $collection = Collection::orderBy('collections.id', 'DESC')
                                ->where('collections.shop', Auth::user()->id)
                                ->where('collections.due', '!=', '0')
                                ->leftJoin('sale_cancels','collections.invoice','sale_cancels.sale_no')
                                ->leftJoin('customers','collections.customer','customers.id')
                                ->select('collections.*','customers.name')
                                ->where('sale_cancels.sale_no', null)
                                ->get();
        $Paid   = $collection->sum('paid');
        $Due    = $collection->sum('due');
        $Amou   = $collection->sum('amount');
        return view('Admin.Report.Due.due_customer_print', 
            compact('company','collection','Paid','Due','Amou'));
    }

    public function due_supplier_report(Request $request)
    {
        $request->session()->flush();
        $payment = Payment::orderBy('payments.id', 'DESC')
                            ->where('payments.shop', Auth::user()->id)
                            ->where('payments.due', '!=', '0')
                            ->leftJoin('purchase_cancels','payments.purchase_no','purchase_cancels.purchase_no')
                            ->leftJoin('suppliers','payments.supplier','suppliers.id')
                            ->select('payments.*','suppliers.name')
                            ->where('purchase_cancels.purchase_no', null)
                            ->get();
        $Paid   = $payment->sum('paid');
        $Due    = $payment->sum('due');
        $Amou   = $payment->sum('amount');
        return view('Admin.Report.Due.due_supplier_report', 
            compact('payment','Paid','Due','Amou'));
    }

    public function due_supplier_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $payment = Payment::orderBy('payments.id', 'DESC')
                            ->where('payments.shop', Auth::user()->id)
                            ->where('payments.due', '!=', '0')
                            ->leftJoin('suppliers','payments.supplier','suppliers.id')
                            ->leftJoin('purchase_cancels','payments.purchase_no','purchase_cancels.purchase_no')
                            ->select('payments.*','suppliers.name')
                            ->where('purchase_cancels.purchase_no', null)
                            ->get();
        $Paid   = $payment->sum('paid');
        $Due    = $payment->sum('due');
        $Amou   = $payment->sum('amount');
        return view('Admin.Report.Due.due_supplier_print', 
            compact('company','payment','Paid','Due','Amou'));
    }

}
