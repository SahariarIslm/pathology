<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use App\Admin\PurchaseCancel;
use App\Admin\Shop;
use App\User;
use Illuminate\Support\Facades\DB;
use DateTime;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function datewise(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $data = Purchase::orderBy('purchases.id', 'DESC')
                        ->whereBetween('purchases.date', [$fromdate, $todate])
                        ->where('purchases.shop', Auth::user()->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplie')
                        ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.datewise', 
            compact('data','fromdate','todate','Qty','Total'));
    }
    
    public function print_datewise(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 
        $data = Purchase::orderBy('purchases.id', 'DESC')
                        ->whereBetween('purchases.date', [$fromdate, $todate])
                        ->where('purchases.shop', Auth::user()->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplie')
                        ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.print_datewise', 
            compact('company','data','fromdate','todate','Qty','Total'));
    }

    public function details(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data   = Purchase::where('purchase_no', $request->id)
                            ->join('users','purchases.user','users.id')
                            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                            ->select('purchases.*','suppliers.name as supplie','users.name as user',
                                    'suppliers.mobile as mobil','suppliers.address as addres')
                            ->get();
        $info   = PurchaseItem::where('purchase_no', $request->id)->get();
        $Qty    = $data->sum('totalQty');
        $Total  = $data->sum('payable');
        return view('Admin.Report.Purchase.invoice', 
            compact('company','data','info','Qty','Total'));
    }

    public function groupby_date(Request $request)
    {
        $data = Purchase::orderBy('date', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->select('date')
                        // ->selectRaw("id,purchase_no,totalQty")
                        ->groupBy('date')
                        ->get();
        $Count = $data->count('id');
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.groupby_date', compact('data','Qty','Total','Count'));
    }

    public function print_groupby(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data = Purchase::orderBy('date', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->select('date')
                        // ->selectRaw("id,purchase_no,totalQty")
                        ->groupBy('date')
                        ->get();
        $Count = $data->count('id');
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.print_groupby_date', 
                compact('company','data','Qty','Total','Count'));
    }

    public function groupby_details(Request $request)
    {
        $data = Purchase::where('purchases.date', $request->id)
                        ->where('purchases.shop', Auth::user()->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplie')
                        ->get();
        $Date = $data->min('date');
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.groupby_details', compact('data','Date','Qty','Total'));
    }

    public function groupby_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data = Purchase::where('purchases.date', $request->id)
                        ->where('purchases.shop', Auth::user()->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplie')
                        ->get();
        $Date = $data->min('date');
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Purchase.print_groupby_details', 
                compact('Date','company','data','Qty','Total'));
    }

}
