<?php

namespace App\Http\Controllers\Report;

use App\Admin\Delivery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin\Sale;
use App\Admin\SaleItem;
use App\Admin\SaleCancel;
use App\Admin\Shop;
use App\User;
use Illuminate\Support\Facades\DB;
use DateTime;

class SaleController extends Controller
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
        $data = Sale::orderBy('sales.id', 'DESC')
                    ->whereBetween('sales.date', [$fromdate, $todate])
                    ->where('sales.shop', Auth::user()->id)
                    ->leftJoin('customers','sales.patient_id','customers.id')
                    ->select('sales.*','customers.name as custom')
                    ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Sale.datewise', 
                compact('data','fromdate','todate','Qty','Total'));
    }
    public function print_datewise(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 
        $data = Sale::orderBy('sales.id', 'DESC')
                    ->whereBetween('sales.date', [$fromdate, $todate])
                    ->where('sales.shop', Auth::user()->id)
                    ->leftJoin('customers','sales.patient_id','customers.id')
                    ->select('sales.*','customers.name as custom')
                    ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Sale.print_datewise', 
                compact('data','fromdate','todate','Qty','Total','company'));
    }

    public function details(Request $request)
    {
        $company    = Shop::where('user_id', Auth::user()->id)->get();
        $data       = Sale::where('sale_no', $request->id)
                            ->join('users','sales.shop','users.id')
                            ->leftJoin('customers','sales.patient_id','customers.id')
                            ->select('sales.*','customers.name','customers.mobile','customers.address')
                            ->get();
        $details    = SaleItem::where('sale_no', $request->id)->get();
        return view('Admin.Report.Sale.invoice_details', compact('company','data','details'));
    }
   
    public function chalan(Request $request)
    {
        $company    = Shop::where('user_id', Auth::user()->id)->get();
        $data       = Sale::where('sale_no', $request->id)
                            ->join('users','sales.shop','users.id')
                            ->leftJoin('customers','sales.patient_id','customers.id')
                            ->select('sales.*','customers.name','customers.mobile','customers.address')
                            ->get();
        $details    = SaleItem::where('sale_no', $request->id)->get();
        return view('Admin.Report.Sale.chalan', compact('company','data','details'));
    }

    public function groupby_date(Request $request)
    {
        $data = Sale::orderBy('date', 'DESC')
            ->where('shop', Auth::user()->id)
            ->select('date')
            ->groupBy('date')
            ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Sale.groupby_date', compact('data','Qty','Total'));
    }
    public function groupby_details(Request $request)
    {
        $data = Sale::where('sales.date', $request->id)
                ->where('sales.shop', Auth::user()->id)
                ->leftJoin('customers','sales.patient_id','customers.id')
                ->select('sales.*','customers.name as custom')
                ->get();
        $Date = $data->min('date');
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Sale.details_groupby_date', compact('data','Qty','Total','Date'));
    }
    public function groupby_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data = Sale::where('sales.date', $request->id)
                ->where('sales.shop', Auth::user()->id)
                ->leftJoin('customers','sales.patient_id','customers.id')
                ->select('sales.*','customers.name as custom')
                ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        return view('Admin.Report.Sale.print_groupby_date', compact('data','Qty','Total','company'));
    }

    public function saleInvoice(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $data = Sale::where('sale_no', $request->id)
                    ->join('users','sales.shop','users.id')
                    ->leftJoin('customers','sales.patient_id','customers.id')
                    ->select('sales.*','customers.name as custom','customers.mobile as mobil')
                    ->get();
        $details = SaleItem::where('sale_no', $request->id)->get();
        return view('Admin.Report.Sale.saleinvoicePrint', compact('company','data','details'));
    }

    public function delivery(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $deliver = $request->deliver;
        $today = date('Y-m-d');
        $delivery = Delivery::orderBy('id', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->get();
        $data = Sale::orderBy('sales.id', 'DESC')
                    ->whereBetween('sales.date', [$fromdate, $todate])
                    ->where('sales.shop', Auth::user()->id)
                    ->where('sales.delivery', $deliver)
                    ->leftJoin('customers','sales.patient_id','customers.id')
                    ->leftJoin('deliveries','sales.delivery','deliveries.id')
                    ->select('sales.*','customers.name as custom','deliveries.name as delivery')
                    ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        return view('Admin.Report.Sale.delivery_system_wise', 
            compact('data','fromdate','todate','Qty','Total','delivery','deliver','Paid','Due','today'));
    }
    public function sale_no(Request $request)
    {
        $data = Sale::where('sale_no', $request->id)
                    ->join('customers','sales.patient_id','customers.id')
                    ->select('sales.*','customers.name as custom')
                    ->get();
        return response()->json($data);
    }
    public function print_delivery(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $deliver = $request->deliver;
        $fromdate = $request->fromdate;
        $todate = $request->todate; 
        $delivery = Delivery::orderBy('id', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->get();
        $data = Sale::orderBy('sales.id', 'DESC')
                    ->whereBetween('sales.date', [$fromdate, $todate])
                    ->where('sales.shop', Auth::user()->id)
                    ->where('sales.delivery', $deliver)
                    ->leftJoin('customers','sales.patient_id','customers.id')
                    ->leftJoin('deliveries','sales.delivery','deliveries.id')
                    ->select('sales.*','customers.name as custom','deliveries.name as delivery')
                    ->get();
        $Qty = $data->sum('totalQty');
        $Total = $data->sum('payable');
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        return view('Admin.Report.Sale.print_delivery_system_wise', 
            compact('data','fromdate','todate','Qty','Total','delivery','deliver','company','Paid','Due'));
    }

}
