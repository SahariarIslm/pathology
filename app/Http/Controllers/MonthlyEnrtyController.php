<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Admin\VehicleCategory;
use App\Admin\ParkingPrice;
use App\Admin\MonthlyEntry;
use App\Admin\Customer;
use DateTime;

class MonthlyEnrtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = MonthlyEntry::where('status',1)
    					->orderBy('id', 'DESC')
    					->get();
        return view('Admin.Monthly.index', compact('data'));
    }

    public function entry(){
    	$time = date('H:i:s');
    	$vehicleCategories = VehicleCategory::orderBy('id', 'DESC')
                        ->where('status',1)
                        ->where('shop', Auth::user()->id)
                        ->get();
    	return view('Admin.Monthly.entry', compact('time','vehicleCategories'));
    }

    public function getClient(){
        $clientInfo = Customer::where('status',1)
                        ->where('licence',request()->vehicle_number)
                        ->get();
        return response()->json([
            'clientInfo'=> $clientInfo
        ]);
    }

    public function getPrice(){
        $monthlyPrice = ParkingPrice::where('status',1)
                        ->where('vehicle_category_id',request()->vehicle_category)
                        ->where('parking_group_id',3)
                        ->get();
        return response()->json([
            'monthlyPrice'=> $monthlyPrice
        ]);
    }
   
    
                                                          
    public function store(Request $request){
        $user_id         = Auth::user()->id;
        $status          = 1;
        $payment_status  = 1;
        $date            = date('Y-m-d');
        $time            = date('H:i:s');
        $name            = $request->name;
        $mobile          = $request->mobile;
        $count           = count(MonthlyEntry::whereDate('created_at', date('Y-m-d'))->get());
        $s               = $count + 1;
        $invoice         = date('Ymd') . $s;
        $vehicleCategory = VehicleCategory::where('id',$request->vehicle_category_id)->first();
        $vehicle_type    = $vehicleCategory->name;
        $clientInfo      = Customer::where('status',1)
                            ->where('licence',request()->vehicle_number)
                            ->first();
        $c_id            = $clientInfo->id;
        $this->validate(request(), [        
            'vehicle_number'      => 'required',
            'vehicle_category_id' => 'required',     
            'price'               => 'required',    
        ]);
        //dd($request->mobile);
        $monthlyEntry = MonthlyEntry::create([
            'invoice'             => $invoice,
            'date'                => $date,
            'end_date'            => $request->end_date,
            'time'                => $time,
            'vehicle_number'      => $request->vehicle_number,
            'name'                => $name,
            'vehicle_category_id' => $request->vehicle_category_id,
            'customer_id'         => $c_id,
            'vehicle_category'    => $vehicle_type,
            'price'               => $request->price,
            'mobile'              => $mobile,
            'payment_status'      => $payment_status,
            'status'              => $status,
            'shop'                => $user_id,
        ]);
       return redirect(route('monthly_entry.index'))->with('success','Monthly Vehicle Listed Successfully');
    }

    public function payment_status(Request $request){
        $data  = MonthlyEntry::find($request->id);
        date_default_timezone_set('Asia/Dhaka');
        $date1 = new DateTime($data->date);
        $date2 = new DateTime($data->end_date);
        $diff  = $date1->diff($date2);
        $date3 = new DateTime(date('Y-m-d'));
        $diff2 = $date1->diff($date3);
        $difference1 = (($diff->format('%y') * 12) + $diff->format('%m'));
        $difference2 = (($diff2->format('%y') * 12) + $diff2->format('%m'));
        if($difference1<$difference2){
            $data->payment_status = '0';
            $data->save();
        }else{
            if($data->payment_status == '1'){
                $data->payment_status = '0';
            }
            else{
                $data->payment_status = '1';    
            }
            $data->save();
        }
        return redirect()->back()->with('success','Payment status changed Successfully');
    }
}
