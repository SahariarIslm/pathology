<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Admin\VehicleCategory;
use App\Admin\ParkingPrice;
use App\Admin\ParkingGroup;
use App\Admin\Customer;
use App\Admin\Checkin;
use Illuminate\Support\Facades\DB;

class CheckinController extends Controller
{
    
    public function index()
    {
        $data              = Checkin::where('checkin',1)
                            ->where('shop', Auth::user()->id)
                            ->orderBy('checkout', 'ASC')
                            ->orderBy('id', 'DESC')
                            ->get();
        $vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->where('shop', Auth::user()->id)
                            ->get();
        $parking_groups    = ParkingGroup::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->where('shop', Auth::user()->id)
                            ->get();

        return response()->json(array(
						    'data'              => $data,
						    'vehicleCategories' => $vehicleCategories,
						    'parking_groups'    => $parking_groups,
						));

    }
    public function getClient(){
        
        $CustomerGroup = DB::table('customers')
	            ->select('customers.*')
	            ->where('licence',request()->vehicle_number)
	            ->first();
        if($CustomerGroup){
            if($CustomerGroup->parking_group_id == 1){
                $clientInfo = DB::table('customers')
                ->select('customers.*')
                ->where('licence',request()->vehicle_number)
                ->first();
            }else{
                //dd($CustomerGroup->parking_group_id);
                $clientInfo = DB::table('customers')
                ->join('monthly_entries', 'monthly_entries.customer_id','customers.id')
                ->select('customers.*', 'monthly_entries.payment_status')
                ->where('licence',request()->vehicle_number)
                ->first();
            }
            return response()->json([ 'clientInfo'=> $clientInfo ]);
        }
        
    }

    public function entry(Request $request){

        $vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                        ->where('status',1)
                        ->where('shop', Auth::user()->id)
                        ->get();
        $parking_groups    = ParkingGroup::orderBy('id', 'DESC')
                        ->where('status',1)
                        ->where('shop', Auth::user()->id)
                        ->get();
        $data = $request;
        return response()->json(array(
						    'data'              => $data,
						    'vehicleCategories' => $vehicleCategories,
						    'parking_groups'    => $parking_groups,
						));
    }

    public function store(Request $request){
        // dd($request);
        $user_id = Auth::user()->id;
        $status = 1;
        $checkin = 1;
        $checkout = 0;
        $datetime= date('Y-m-d H:i:s');
        $customer = Customer::where('licence',$request->vehicle_number,)->first();
        $this->validate(request(), [        
            'invoice'             => 'required|unique:checkins',  
        ]);
        $medicine = Checkin::create([
            'invoice'             => $request->invoice,
            'datetime'            => $datetime,
            'vehicle_number'      => $request->vehicle_number,
            'vehicle_category_id' => $request->vehicle_category_id,
            'customer_id'         => $customer->id,
            'parking_group_id'    => $request->parking_group_id,
            'price'               => $request->price,
            'monthly_price'       => $request->monthly_price,
            'penalty'             => $request->penalty,
            'phone'               => $request->phone,
            'checkin'             => $checkin,
            'checkout'            => $checkout,
            'status'              => $status,
            'shop'                => $user_id,
        ]);
        $msg = 'Data Stored Successfully';
        return response()->json($msg);
    }

    public function clientRegister(Request $request){
        $vehicleType = VehicleCategory::where('id',$request->vehicle_type_id)
                        ->where('shop', Auth::user()->id)
                        ->first();
        $parkingGroup = ParkingGroup::where('id',$request->parking_group_id)
                        ->where('shop', Auth::user()->id)
                        ->first();
        $data                   = new Customer();
        $data->name             = $request->name;
        $data->licence          = $request->vehicle_number;
        $data->vehicle_type_id  = $request->vehicle_type_id;
        $data->vehicle_type     = $vehicleType->name;
        $data->parking_group_id = $request->parking_group_id;
        $data->parking_group    = $parkingGroup->name;
        $data->mobile           = $request->mobile;
        $data->status           = '1';
        $data->shop             = Auth::user()->id;
        $data->save();

        $vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->where('shop', Auth::user()->id)
                            ->get();
        $parking_groups    = ParkingGroup::orderBy('id', 'DESC')
                            ->where('status',1)
                            ->where('shop', Auth::user()->id)
                            ->get();
        $data->vehicle_number  = $data->licence;

        $msg = 'Data Stored Successfully';

       	return response()->json(array(
						    'data'              => $data,
						    'vehicleCategories' => $vehicleCategories,
						    'parking_groups'    => $parking_groups,
						    'msg'               => $msg,
						));
    }

    public function checkout(Request $request){
        $data = Checkin::find($request->id);
        if ($data->checkout == '0') {
            $data->checkout = '1';    
        }
        else{   
            $data->checkout = '0';    
        }
        $data->save();

        $msg = 'Checked Out Successfully';
       	return response()->json( $msg );
    }
}
