<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Admin\VehicleCategory;
use App\Admin\ParkingGroup;

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
        return view('Admin.Customer.customer', compact('data'));
    }

    public function store(Request $request)
    {
        $data                   = new Customer();
        $data->name             = $request->name;
        $data->p_id             = $request->p_id;
        $data->address          = $request->address;
        $data->age              = $request->age;
        $data->gender           = $request->gender;
        $data->mobile           = $request->mobile;
        $data->district         = $request->district;
        $data->status           = '1';
        $data->shop             = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('message','Client Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Customer::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        $vehicleType = VehicleCategory::where('id',$request->vehicle_type_id)
                        ->where('shop', Auth::user()->id)
                        ->first();
        $parkingGroup = ParkingGroup::where('id',$request->parking_group_id)
                        ->where('shop', Auth::user()->id)
                        ->first();
        Customer::where('id',$request->id)
            ->update([
                    'name'             => $request->name,
                    'licence'          => $request->licence,
                    'model_no'         => $request->model_no,
                    'vehicle_type_id'  => $request->vehicle_type_id,
                    'vehicle_type'     => $vehicleType->name,
                    'parking_group_id' => $request->parking_group_id,
                    'parking_group'    => $parkingGroup->name,
                    'mobile'           => $request->mobile,
                    'color'            => $request->color,
                    'address'          => $request->address,
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
