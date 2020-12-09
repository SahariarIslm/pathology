<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\PatientReference;
use Illuminate\Support\Facades\Auth;

class PatientReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = PatientReference::orderBy('id', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->get();
        return view('Admin.PatientReference.reference', compact('data'));
    }

    public function store(Request $request)
    {
        $data           = new PatientReference();
        $data->name     = $request->name;
        $data->address  = $request->address;
        $data->phone    = $request->phone;
        $data->discount = $request->discount;
        $data->details  = $request->details;
        $data->status   = '1';
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Patient Reference Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = PatientReference::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        PatientReference::where('id',$request->id)
            ->update([
                    'name'             => $request->name,
                    'address'          => $request->address,
                    'phone'            => $request->phone,
                    'discount'         => $request->discount,
                    'details'          => $request->details,
                ]);
        return redirect()->back()->with('message','Patient Reference Updated Successfully');
    }
    public function destroy($id){
        $data = PatientReference::find($id)->delete();
        return redirect()->back()->with('danger','Patient Reference Deleted Successfully');
    }
}
