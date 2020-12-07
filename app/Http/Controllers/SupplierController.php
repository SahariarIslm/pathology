<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = Supplier::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.Supplier.supplier', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Supplier();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->balance = $request->balance;
        $data->status = '1';
        $data->shop = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Manufacturer Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Supplier::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Supplier::where('id',$request->id)
            ->update([
                    'name'    => $request->name,
                    'mobile'  => $request->mobile,
                    'address' => $request->address,
                    'balance' => $request->balance,
                ]);
        return redirect()->back()->with('message','Supplier Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Supplier::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Supplier Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        // $id = $request->id;
        // DB::delete('delete FROM suppliers WHERE id = ?', [$id]);
        $data = Supplier::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Supplier Deleted Successfully');
    }

}
