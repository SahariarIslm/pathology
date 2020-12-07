<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin\VehicleCategory;
use App\Admin\MonthlyEntry;
use App\Admin\MonthlyCheckin;

class MonthlyCheckinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = MonthlyCheckin::where('checkin',1)
                    ->where('checkout',0)
                    ->orderBy('id', 'DESC')
                    ->get();
        return view('Admin.MonthlyCheckin.index', compact('data'));
    }

    public function entry(){
    	$time = date('H:i:s');
    	$vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                ->where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
    	return view('Admin.MonthlyCheckin.entry', compact('time','vehicleCategories'));

    }

    public function getClient(){
        $clientInfo = MonthlyEntry::where('status',1)
                    ->where('vehicle_number',request()->vehicle_number)
                    ->where('payment_status',1)
                    ->get();
        return response()->json([
            'clientInfo'=> $clientInfo
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
            'invoice' => 'required|unique:monthly_checkins',
            'vehicle_number' => 'required',
            'vehicle_category' => 'required',    
        ]);

        $medicine = MonthlyCheckin::create([

            'invoice'          => $request->invoice,
            'date'             => $date,
            'time'             => $time,
            'vehicle_number'   => $request->vehicle_number,
            'vehicle_category' => $request->vehicle_category,
            'name'             => $request->name,
            'phone'            => $request->phone,
            'checkin'          => $checkin,
            'checkout'         => $checkout,
            'status'           => $status,
            'shop'             => $user_id,

        ]);
       return redirect(route('monthly_checkin.index'))->with('success','Vehicle Checked in Successfully');
    }

    public function checkout(Request $request){
        $data = MonthlyCheckin::find($request->id);
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
