<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Admin\VehicleCategory;
use App\Admin\ParkingPrice;
use App\Admin\HourlyEntry;

class HourlyEntryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = HourlyEntry::where('checkin',1)
                    ->where('shop', Auth::user()->id)
					->orderBy('checkout', 'ASC')
                    ->orderBy('id', 'DESC')
					->get();
        return view('Admin.Hourly.index', compact('data'));
    }

    public function entry(){
    	$time = date('H:i:s');
    	$vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
    	return view('Admin.Hourly.entry', compact('time','vehicleCategories'));
    }

    public function getPrice(){
        $hourlyPrice = ParkingPrice::where('status',1)
                ->where('vehicle_category_id',request()->vehicle_category)
                ->where('parking_group_id',1)
                ->get();
        return response()->json([
            'hourlyPrice'=> $hourlyPrice
        ]);
    }

    public function store(Request $request){
        $user_id = Auth::user()->id;
        $status = 1;
        $checkin = 1;
        $checkout = 0;
        $date = date('Y-m-d');
        $time = date('H:i:s');
        $this->validate(request(), [        
            'invoice' => 'required|unique:hourly_entries',
            'vehicle_number' => 'required',
            'vehicle_category_id' => 'required',     
            'price'=>'required',    
        ]);
        $medicine = HourlyEntry::create([
            'invoice' =>  $request->invoice,
            'date' => $date,
            'time' => $time,
            'vehicle_number' => $request->vehicle_number,
            'vehicle_category_id' => $request->vehicle_category_id,
            'price' => $request->price,
            'penalty' => $request->penalty,
            'phone' => $request->phone,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'status' => $status,
            'shop' => $user_id,
        ]);
       return redirect(route('hourly_entry.index'))->with('success','Vehicle Checked in Successfully');
    }

    public function checkout(Request $request){
        $data = HourlyEntry::find($request->id);
        if ($data->checkout == '0') {
            $data->checkout = '1';    
        }
        else{   
            $data->checkout = '0';    
        }
        $data->save();
        return redirect()->back()->with('success','checked out Successfully');
    }
}
