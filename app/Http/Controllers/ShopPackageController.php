<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\ShopPackage;

class ShopPackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:superAdmin');
    }

    public function index()
    {
        $data = ShopPackage::orderBy('id', 'DESC')->get();
        return view('Admin.Shop.shopPackage', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new ShopPackage();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->days = $request->days;
        $data->status = '1';
        $data->save();
        return redirect()->back()->with('message','Shop Package Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = ShopPackage::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        ShopPackage::where('id',$request->id)
            ->update([
                    'name'  => $request->name,
                    'price' => $request->price,
                    'days'  => $request->days,
                ]);
        return redirect()->back()->with('message','Shop Package Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = ShopPackage::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Shop Package Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = ShopPackage::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Shop Package Deleted Successfully');
    }

}
