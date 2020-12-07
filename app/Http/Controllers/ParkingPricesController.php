<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Admin\Delivery;
use App\Admin\ParkingGroup;
use App\Admin\VehicleCategory;
use App\Admin\ParkingPrice;


class ParkingPricesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:admin');
    }

    public function index()
    {
        $datas = ParkingPrice::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.ParkingPrice.index', compact('datas'));
    }

    public function create(){
        $parkingZones = Delivery::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $parkingGroups = ParkingGroup::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $vehicleTypes = VehicleCategory::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
    	return view('Admin.ParkingPrice.create', compact('parkingZones','parkingGroups','vehicleTypes'));
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $status = 1;

        $this->validate(request(), [        
            'delivery_id' => 'required',     
            'parking_group_id' => 'required',     
            'vehicle_category_id' => 'required',     
            'price' => 'required',     
        ]);

        $parkingPrice = ParkingPrice::create([
            'delivery_id'    => $request->delivery_id,
            'parking_group_id' => $request->parking_group_id,
            'vehicle_category_id'  => $request->vehicle_category_id,
            'price'      => $request->price,
            'penalty'    => $request->penalty,
            'details'    => $request->details,
            'status'     => $status,
            'shop'       => $user_id,
        ]);
       return redirect(route('parking_price.index'))->with('success','Parking Price Added Successfully');
    }

     public function edit($id){
        $data = ParkingPrice::where('id',$id)->first();
        $parkingZones = Delivery::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $parkingGroups = ParkingGroup::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $vehicleTypes = VehicleCategory::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.ParkingPrice.edit', compact('data','parkingZones','parkingGroups','vehicleTypes'));
    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $status = 1;
        $data = ParkingPrice::where('id',$id)->first();

        $data->update([
            'delivery_id' => $request->delivery_id,
            'parking_group_id' => $request->parking_group_id,
            'vehicle_category_id' => $request->vehicle_category_id,
            'price' => $request->price,
            'penalty' => $request->penalty,
            'details' => $request->details,
            'status' => $status,
            'shop' => $user_id,        
        ]);
        return redirect(route('parking_price.index'))->with('success','Parking Price Updated Successfully');
    }

     public function status(Request $request){
        $data = ParkingPrice::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('success','Medicine Status Changed Successfully');
    }

    public function destroy(Request $request){
        $data = ParkingPrice::find($request->id)->delete();
        return redirect()->back()->with('danger','Parking Price Deleted Successfully');
    }
}
