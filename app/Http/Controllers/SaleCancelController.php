<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Sale;
use App\Admin\SaleItem;
use App\Admin\SaleCancel;
use Illuminate\Support\Facades\Auth;
use App\Admin\Customer;
use Illuminate\Support\Facades\DB;

class SaleCancelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function index()
    {
        $data = Sale::orderBy('sales.id', 'DESC')
                    ->where('sales.shop', Auth::user()->id)
                    ->leftJoin('customers','sales.customer','customers.id')
                    ->leftJoin('sale_cancels','sales.sale_no','sale_cancels.sale_no')
                    ->select('sales.*','customers.name as custome')
                    ->where('sale_cancels.sale_no', null)
                    ->get();
        return view('Admin.Sale.sale_cancel', compact('data'));
    }

    public function details(Request $request)
    {
        $data = Sale::where('sales.sale_no', $request->id)
                    ->leftJoin('customers','sales.customer','customers.id')
                    ->select('sales.*','customers.name','customers.mobile','customers.id as ID')
                    ->get();
        $details = SaleItem::where('sale_no', $request->id)->get();
        return view('Admin.Sale.sale_cancel_details', compact('data','details'));
    }

    public function confirm(Request $request)
    {
        $data = new SaleCancel();
        $data->sale_no      = $request->sale_no;
        $data->customer     = $request->customer_id;
        $data->cancel_date  = $request->date;
        $data->totalQty     = $request->totalQty;
        $data->subTotal     = $request->payable;
        $data->s_date       = $request->s_date;
        $data->user         = Auth::user()->id;
        $data->shop         = Auth::user()->id;
        $data->save();
        
        $details = SaleItem::where('sale_no', $request->sale_no)->get();

        foreach ($details as $item)  {
            $code = $item->code;
            $qty  = $item->qty;
            $update = DB::table('stocks')
                        ->where('code', $code)
                        ->increment('quantity', $qty);
        } 
        return redirect()->route('sale.cancel.index')->with('success','Sale Canceled Successfully');
    }

}
