<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Customer;
use App\Admin\PatientReference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = Customer::orderBy('id', 'DESC')
            ->where('shop', Auth::user()->id)
            ->get();
        $references = PatientReference::orderBy('id', 'DESC')
            ->where('shop', Auth::user()->id)
            ->get();
        return view('Admin.Customer.customer', compact('data','references'));
    }

    public function store(Request $request)
    {
        $data                   = new Customer();
        $data->name             = $request->name;
        $data->p_id             = $request->p_id;
        $data->address          = $request->address;
        $data->age              = $request->age;
        $data->gender           = $request->gender;
        $data->reference_id     = $request->reference_id;
        $data->mobile           = $request->mobile;
        $data->district         = $request->district;
        $data->status           = '1';
        $data->shop             = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('message','Patient Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Customer::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Customer::where('id',$request->id)
            ->update([
                    'name'             => $request->name,
                    'p_id'             => $request->p_id,
                    'address'          => $request->address,
                    'age'              => $request->age,
                    'gender'           => $request->gender,
                    'reference_id'     => $request->reference_id,
                    'mobile'           => $request->mobile,
                    'district'         => $request->district,
                ]);
        return redirect()->back()->with('message','Client Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Customer::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Client Status Changed Successfully');
    }

    public function destroy($id){
        $data = Customer::find($id)->delete();
        return redirect()->back()->with('danger','Client Deleted Successfully');
    }
}
