<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\ShopPayment;
use Illuminate\Support\Facades\Auth;
use App\Admin\ShopPackage;
use DateTime;
use Illuminate\Support\Facades\DB;

class ShopPaymentController extends Controller
{
    public function index()
    {
        $today = date('Y-m-d');
        $package = ShopPackage::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->get();
        $packag = ShopPackage::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->get();
        $data = ShopPayment::orderBy('id', 'DESC')
                            ->join('users','shop_payments.shop','users.id')
                            ->join('shops','users.id','shops.user_id')
                            ->select('shop_payments.*','shops.business_name as shopname','users.mobile as phone')
                            ->get();
        return view('Admin.Shop.shopPayment', compact('data','package','packag','today'));
    }

    public function lindex()
    {
        $today = date('Y-m-d');
        $package = ShopPackage::orderBy('id', 'DESC')
                                ->where('status',1)
                                ->get();
        $packag = ShopPackage::orderBy('id', 'DESC')
                                ->where('status',1)
                                ->get();
        $data = ShopPayment::orderBy('id', 'DESC')
                                ->where('shop', Auth::user()->id)
                                ->get();
        return view('Admin.Shop.shopPayment', compact('data','package','packag','today'));
    }

    public function shoppkg(Request $request)
    {
        $data = ShopPackage::where('name', $request->id)->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        // $pre = ShopPayment::where('shop', Auth::user()->shop)->get();
        // $pre->status = '0';
        // $pre->save();
        ShopPayment::where('shop', Auth::user()->id)->update([ 'status' => '0' ]);

        $data           = new ShopPayment();
        $data->date     = $request->date;
        $data->package  = $request->package;
        $data->price    = $request->price;
        $data->days     = $request->days;
        $data->comment  = $request->comment;
        $data->type     = $request->type;
        $data->number   = $request->number;
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('message','Shop Payment Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = ShopPayment::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        ShopPayment::where('id',$request->id)
            ->update([
                    'date'      => $request->date,
                    'package'   => $request->package,
                    'price'     => $request->price,
                    'details'   => $request->details,
                ]);
        return redirect()->back()->with('message','Shop Payment Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = ShopPayment::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Shop Payment Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = ShopPayment::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Shop Payment Deleted Successfully');
    }

}
