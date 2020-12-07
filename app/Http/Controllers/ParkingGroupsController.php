<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin\ParkingGroup;

class ParkingGroupsController extends Controller
{
    public function index(){
        $parkingGroups = ParkingGroup::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.ParkingGroup.index', compact('parkingGroups'));
    }

    public function create(){
    	return view('Admin.ParkingGroup.create');
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $status = 1;

        $this->validate(request(), [        
            'name' => 'required|unique:parking_groups',     
        ]);

        $vehicleTypes = ParkingGroup::create([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $status,
            'shop' => $user_id,
        ]);
       return redirect(route('parking_group.index'))->with('success','Parking Group Type Added Successfully');
    }

    public function edit($id){
        $data = ParkingGroup::where('id',$id)->first();
        return view('Admin.ParkingGroup.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $status = 1;
        $data = ParkingGroup::where('id',$id)->first();

        $data->update([
            'name' => $request->name,
            'details' => $request->details,
            'status' => $status,
            'shop' => $user_id,         
        ]);
        return redirect(route('parking_group.index'))->with('success','Parking Group Updated Successfully');
    }

    public function status(Request $request){
        $data = ParkingGroup::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('success','Parking Group Status Changed Successfully');
    }

    public function destroy(Request $request){
        $data = ParkingGroup::find($request->id)->delete();
        return redirect()->back()->with('danger','Parking Group Deleted Successfully');
    }
}
