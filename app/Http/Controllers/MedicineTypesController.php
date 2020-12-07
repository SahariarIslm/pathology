<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\MedicineType;
use Illuminate\Support\Facades\Auth;

class MedicineTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = MedicineType::orderBy('id', 'DESC')
            ->where('shop', Auth::user()->id)
            ->get();
        return view('Admin.MedicineTypes.medicine', compact('data'));
    }

    public function store(Request $request)
    {
        $data           = new MedicineType();
        $data->name     = $request->name;
        $data->status   = '1';
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Medicine Type Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = MedicineType::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        MedicineType::where('id',$request->id)->update([ 'name' => $request->name ]);
        return redirect()->back()->with('message','Category Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = MedicineType::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Medicine Type Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = MedicineType::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Medicine Type Deleted Successfully');
    }
}
