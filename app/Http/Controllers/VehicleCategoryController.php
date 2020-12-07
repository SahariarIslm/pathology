<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin\VehicleCategory;

class VehicleCategoryController extends Controller
{
	public function index()
    {
        $vehicleTypes = VehicleCategory::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.VehicleType.index', compact('vehicleTypes'));
    }

    public function create(){
    	return view('Admin.VehicleType.create');
    }
    
    public function store(Request $request){
        $user_id = Auth::user()->id;
        $status = 1;

        $this->validate(request(), [        
            'name' => 'required|unique:vehicle_categories',     
        ]);

        $vehicleTypes = VehicleCategory::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $status,
            'shop' => $user_id,
        ]);
       return redirect(route('vehicle_category.index'))->with('success','Vehicle Type Added Successfully');
    }

    public function edit($id){
        $data = VehicleCategory::where('id',$id)->first();

        return view('Admin.VehicleType.edit', compact('data'));

    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $status = 1;
        $data = VehicleCategory::where('id',$id)->first();

        $data->update([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $status,
            'shop' => $user_id,         
        ]);
        return redirect(route('vehicle_category.index'))->with('success','Vehicle Type Updated Successfully');
    }

    public function destroy(Request $request){
        $data = VehicleCategory::find($request->id)->delete();
        return redirect()->back()->with('danger','Vehicle Type Deleted Successfully');
    }

    public function status(Request $request){
        $data = VehicleCategory::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('success','Vehicle Type Status Changed Successfully');
    }
}
