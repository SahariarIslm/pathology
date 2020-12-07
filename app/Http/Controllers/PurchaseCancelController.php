<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\PurchaseCancel;
use App\Admin\Supplier;
use Illuminate\Support\Facades\Auth;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use Illuminate\Support\Facades\DB;

class PurchaseCancelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function index()
    {
        $data = Purchase::orderBy('purchases.id', 'DESC')
                        ->where('purchases.shop', Auth::user()->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->leftJoin('purchase_cancels','purchases.purchase_no','purchase_cancels.purchase_no')
                        ->select('purchases.*','suppliers.name as supplie')
                        ->where('purchase_cancels.purchase_no', null)
                        ->get();
        return view('Admin.PurchaseCancel.purchase_cancel', compact('data'));
    }

    public function details(Request $request)
    {
        $data = Purchase::where('purchases.purchase_no', $request->id)
                        ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                        ->select('purchases.*','suppliers.name as supplie','suppliers.id as ID',
                                    'suppliers.mobile as mobil')
                        ->get();
        $details = PurchaseItem::where('purchase_no', $request->id)->get();
        return view('Admin.PurchaseCancel.purchase_cancel_details', compact('data','details'));
    }


    public function confirm(Request $request)
    {
        $data = new PurchaseCancel();
        $data->purchase_no  = $request->purchase_no;
        $data->supplier     = $request->supplier_id;
        $data->cancel_date  = $request->date;
        $data->totalQty     = $request->totalQty;
        $data->subTotal     = $request->payable;
        $data->p_date       = $request->p_date;
        $data->user         = Auth::user()->id;
        $data->shop         = Auth::user()->id;
        $data->save();
       
        $details = PurchaseItem::where('purchase_no', $request->purchase_no)->get();

        foreach ($details as $item)  {
            $code = $item->code;
            $qty  = $item->qty;
            $update = DB::table('stocks')
                        ->where('code', $code)
                        ->decrement('quantity', $qty);
        } 
        return redirect()->route('purchase.cancel.index')->with('success','Purchase Canceled Successfully');
    }

}
