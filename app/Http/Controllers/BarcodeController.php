<?php

namespace App\Http\Controllers;

use App\Admin\Shop;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarcodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index(Request $request)
    {
        // \Cart::clear();
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $barcode = DB::table('purchase_items')
                    ->where('purchase_items.shop', Auth::user()->id)
                    ->orderBy('purchase_items.id', 'DESC')
                    ->whereBetween('purchase_items.date', [$fromdate, $todate])
                    ->join('products','purchase_items.code','=','products.code')
                    ->select('purchase_items.*','products.price')
                    ->get();
        return view('Admin.Barcode.generate_barcode', compact('fromdate','todate','barcode'));
    }

    public function edit(Request $request)
    {
        $data = DB::table('purchase_items')
                ->where('purchase_items.id', $request->id)
                ->join('products','purchase_items.code','=','products.code')
                ->select('purchase_items.*','products.price')
                ->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        \Cart::add(array(
                    'id'         => $request->id, 
                    'name'       => $request->name,
                    'price'      => $request->price,
                    'quantity'   => $request->qty,
                    'attributes' => array(
                        'code'   => $request->code,
                        )
                ));
        $msg = "Barcode Added to Cart Successfully ....";
        $request->session()->flash('status', $msg);
    }

    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('warning','Barcode Removed from Cart...');
    }

    public function clean()
    {
        \Cart::clear();
        return redirect()->back()->with('danger','All Barcodes Cleared from Cart...');
    }

    public function generate()
    {
        $company = Shop::where('user_id', Auth::user()->id)->first();
        $business_name = $company->business_name;
        return view('Admin.Barcode.print_barcode', compact('business_name'));
    }

}
