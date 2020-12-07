<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\MedicineUnit;
use Illuminate\Support\Facades\Auth;

class MedicineUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = MedicineUnit::orderBy('id', 'DESC')
            ->where('shop', Auth::user()->id)
            ->get();
        return view('Admin.MedicineUnit.medicine', compact('data'));
    }

    public function store(Request $request)
    {
        $data           = new MedicineUnit();
        $data->name     = $request->name;
        $data->status   = '1';
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Medicine Unit Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = MedicineUnit::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        MedicineUnit::where('id',$request->id)->update([ 'name' => $request->name ]);
        return redirect()->back()->with('message','Medicine Unit Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = MedicineUnit::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Medicine Unit Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = MedicineUnit::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Medicine Unit Deleted Successfully');
    }
}
