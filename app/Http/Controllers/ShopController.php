<?php

namespace App\Http\Controllers;

use App\Admin\Reference;
use App\Admin\ShopPackage;
use App\Admin\ShopPayment;
use Illuminate\Http\Request;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:superAdmin');
    }

    public function index()
    {
        $today = date('Y-m-d');
        $data = User::orderBy('shop_payments.created_at', 'DESC')
                    ->where('users.role', '=', 'Admin')
                    // ->where('shop_payments.status','=',1)
                    // ->rightJoin('shop_payments','users.id','shop_payments.shop')
                    ->leftJoin('shop_payments', function ($join) {
                        $join->on('users.id', '=', 'shop_payments.shop')
                            ->where('shop_payments.status', '=', 1);
                    })
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.*','shop_payments.date as paydate','shop_payments.days as exdays',
                            'shop_payments.status as tatus','shops.business_name','shops.area')
                    // ->where('shop_payments.status','=',1)
                    ->get();
        return view('Admin.Shop.shop', compact('data','today'));
    }

    public function status(Request $request)
    {
        $data = User::find($request->id);
        if ($data->status == 'Active') 
        {
            $data->status = 'Inactive';    
            $shop = $data->shop;
            $data = User::find($shop);
            $data->status = 'Inactive'; 
        } 
        else 
        {   
            $data->status = 'Active'; 
            $shop = $data->shop;
            $data = User::find($shop);
            $data->status = 'Active';
        }
        $data->save();
        return redirect()->back()->with('message','Shop Status Changed Successfully');
    }

    public function reference()
    {
        $districts = DB::table('districts')->orderBy('name','asc')->get();
        $data = User::orderBy('id', 'DESC')
                ->where('role', 'Reference')
                ->join('references','users.id','references.user_id')
                ->select('users.*','references.area','references.address','references.bkash_no')
                ->get();
        return view('Admin.Reference.reference_list', compact('data','districts'));
    }

    public function reference_store(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|digits:11|unique:users',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $data           = new User();
        $data->name     = $request->name;
        $data->mobile   = $request->mobile;
        $data->email    = $request->email;
        $data->role     = 'Reference';
        $data->password = Hash::make($request->password);
        $data->save();

        $new            = new Reference();
        $new->user_id   = $data->id;
        $new->area      = $request->area;
        $new->address   = $request->address;
        $new->bkash_no  = $request->bkash;
        $new->save();
        return redirect()->back()->with('success',' Reference Added Successfully');
    }

    public function reference_status(Request $request)
    {
        $data = User::find($request->id);
        if ($data->status == 'Active') {
            $data->status = 'Inactive';    
        }
        else{   
            $data->status = 'Active';    
        }
        $data->save();
        return redirect()->back()->with('message',' Reference Status Changed Successfully');
    }

    public function area_wise(Request $request)
    {
        $area = $request->area;
        $status = $request->status;
        $districts = DB::table('districts')->orderBy('name','asc')->get();
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('shops.area', $area)
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.area_wise', compact('shop','districts','area','status'));
    }
    
    public function business_type(Request $request)
    {
        $b_type = $request->b_type;
        $status = $request->status;
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('shops.business_type', $b_type)
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.business_type', compact('shop','b_type','status'));
    }

    public function status_wise(Request $request)
    {
        $request->session()->flush();
        $status = $request->status;
        Session::put('status', $status);
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.status_wise', compact('shop','status'));
    }

    public function status_wise_print(Request $request)
    {
        $status = Session::get('status');
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.status_wise_print', compact('shop','status'));
    }

    public function reference_wise(Request $request)
    {
        $request->session()->flush();
        $status = $request->status;
        $references = User::orderBy('id', 'DESC')->where('role', 'Reference')->get();
        $mobile = $request->mobile;
        if ( $request->mobile ) { 
            $data = User::where('mobile', $mobile)->first();
            $reference = $data->name;
        } else {
            $reference = $request->reference;
        }
        Session::put('status', $status);
        Session::put('mobile', $mobile);
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('shops.reference_no', $mobile)
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.reference_wise', compact('shop','references','reference','status'));
    }

    public function reference_print(Request $request)
    {
        
        $status = Session::get('status');
        $mobile = Session::get('mobile');
        $data = User::where('mobile', $mobile)->first();
        $reference = $data->name;
        $shop = User::orderBy('users.id', 'DESC')
                    ->where('users.role','Admin')
                    ->where('shops.reference_no', $mobile)
                    ->where('users.status', $status)
                    ->join('shops','users.id','shops.user_id')
                    ->select('users.role','users.name','users.mobile','users.email','users.status',
                            'shops.business_name','shops.area','shops.address','shops.business_type')
                    ->get();
        return view('Admin.Report.Shop.reference_print', compact('shop','reference','status'));
    }

    public function payment_expiry()
    {
        $today = date('Y-m-d');
        $data = User::orderBy('shop_payments.created_at', 'DESC')
                    ->where('users.role', '=', 'Admin')
                    ->leftJoin('shop_payments', function ($join) {
                        $join->on('users.id', '=', 'shop_payments.shop')
                            ->where('shop_payments.status', '=', 1);
                    })
                    ->select('users.*','shop_payments.date as paydate',
                            'shop_payments.days as exdays','shop_payments.status as tatus')
                    ->get();
        return view('Admin.Report.Shop.payment_expiry', compact('data','today'));
    }

    public function paymentExpiry()
    {
        $today = date('Y-m-d');
        $data = User::orderBy('shop_payments.created_at', 'DESC')
                    ->where('users.role', '=', 'Admin')
                    ->leftJoin('shop_payments', function ($join) {
                        $join->on('users.id', '=', 'shop_payments.shop')
                            ->where('shop_payments.status', '=', 1);
                    })
                    ->select('users.*','shop_payments.date as paydate',
                            'shop_payments.days as exdays','shop_payments.status as tatus')
                    ->get();
        return view('Admin.Report.Shop.payment_expiry_print', compact('data','today'));
    }

    public function payment_expired()
    {
        $today = date('Y-m-d');
        $data = User::orderBy('shop_payments.created_at', 'DESC')
                    ->where('users.role', '=', 'Admin')
                    ->leftJoin('shop_payments', function ($join) {
                        $join->on('users.id', '=', 'shop_payments.shop')
                            ->where('shop_payments.status', '=', 1);
                    })
                    ->select('users.*','shop_payments.date as paydate',
                            'shop_payments.days as exdays','shop_payments.status as tatus')
                    ->get();
        return view('Admin.Report.Shop.payment_expired', compact('data','today'));
    }

    public function paymentExpired()
    {
        $today = date('Y-m-d');
        $data = User::orderBy('shop_payments.created_at', 'DESC')
                    ->where('users.role', '=', 'Admin')
                    ->leftJoin('shop_payments', function ($join) {
                        $join->on('users.id', '=', 'shop_payments.shop')
                            ->where('shop_payments.status', '=', 1);
                    })
                    ->select('users.*','shop_payments.date as paydate',
                            'shop_payments.days as exdays','shop_payments.status as tatus')
                    ->get();
        return view('Admin.Report.Shop.payment_expired_print', compact('data','today'));
    }

    public function datewise(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        Session::put('fromdate', $fromdate);
        Session::put('todate', $todate);
        $data = ShopPayment::orderBy('shop_payments.id', 'DESC')
                ->whereBetween('shop_payments.date', [$fromdate, $todate])
                ->join('users','shop_payments.shop','users.id')
                ->join('shops','users.id','shops.user_id')
                ->select('users.role','users.name','users.mobile','users.email','users.status',
                        'shops.business_name','shops.area','shops.address','shops.business_type',
                        'shop_payments.*')
                ->get();
        $total = $data->sum('price');
        return view('Admin.Report.Shop.datewise_payment', 
            compact('data','fromdate','todate','total'));
    }

    public function datewise_print(Request $request)
    {
        $fromdate = Session::get('fromdate');
        $todate = Session::get('todate');
        $shop = ShopPayment::orderBy('shop_payments.id', 'DESC')
                ->whereBetween('shop_payments.date', [$fromdate, $todate])
                ->join('users','shop_payments.shop','users.id')
                ->join('shops','users.id','shops.user_id')
                ->select('users.name','users.mobile','users.email','users.status',
                        'shops.business_name','shops.area','shops.address','shops.business_type',
                        'shop_payments.*')
                ->get();
        $total = $shop->sum('price');
        return view('Admin.Report.Shop.datewise_print', 
            compact('shop','fromdate','todate','total'));
    }

    public function reference_datewise(Request $request)
    {
        $request->session()->flush();
        $references = User::orderBy('id', 'DESC')->where('role', 'Reference')->get();
        $mobile = $request->mobile;
        if ( $request->mobile ) { 
            $data = User::where('mobile', $mobile)->first();
            $reference = $data->name;
        } else {
            $reference = $request->reference;
        }
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        Session::put('fromdate', $fromdate);
        Session::put('todate', $todate);
        Session::put('mobile', $mobile);
        $data = ShopPayment::orderBy('id', 'DESC')
                ->where('users.role', 'Admin')
                ->where('shops.reference_no', $mobile)
                ->whereBetween('shop_payments.date', [$fromdate, $todate])
                ->join('users','shop_payments.shop','users.id')
                ->join('shops','users.id','shops.user_id')
                ->select('users.role','users.name','users.mobile',
                        'shops.business_name','shops.reference_no','shops.business_type',
                        'shop_payments.*')
                ->get();
        $total = $data->sum('price');
        return view('Admin.Report.Shop.reference_datewise', 
            compact('data','references','fromdate','todate','total'));
    }

    public function reference_datewise_print(Request $request)
    {
        $fromdate = Session::get('fromdate');
        $todate = Session::get('todate');
        $mobile = Session::get('mobile');
        $data = User::where('mobile', $mobile)->first();
        $reference = $data->name;
        $shop = ShopPayment::orderBy('id', 'DESC')
                // ->where('shop_payments.status', 1)
                ->where('users.reference_no', $mobile)
                ->whereBetween('shop_payments.date', [$fromdate, $todate])
                ->join('users','shop_payments.shop','users.id')
                ->select('shop_payments.*','users.business_name as shopname','users.reference_no')
                ->get();
        $total = $shop->sum('price');
        return view('Admin.Report.Shop.reference_datewise_print', 
            compact('shop','fromdate','todate','reference','total'));
    }

}
