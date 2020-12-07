<?php

namespace App\Http\Controllers;

use App\Admin\Reference;
use App\Admin\ReferencePayment;
use App\Admin\Shop;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ReferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function reference_edit(Request $request)
    {
        $data = User::where('users.id', $request->id)
                    ->join('references','users.id','references.user_id')
                    ->select('references.*','users.name')
                    ->get();
        return response()->json($data);
    }

    public function reference_update(Request $request)
    {
        // $request->validate([
        //     'password'  => 'required|string|min:8|confirmed',
        // ]);
        $data           = User::find($request->id);
        $data->name     = $request->name;
        $data->password = Hash::make($request->password); 
        $data->save();

        $new            = Reference::where('user_id', $request->id)->first();
        $new->area      = $request->area;
        $new->address   = $request->address;
        $new->bkash_no  = $request->bkash;
        $new->save();

        return redirect()->back()->with('message','Reference Into Updated Successfully');
    }

    public function shop_list()
    {
        $data = User::orderBy('id', 'DESC')
                    ->where('role', 'Admin')
                    ->join('shops','users.id','shops.user_id')
                    ->select('shops.*','users.name')
                    ->where('shops.reference_no', Auth::user()->mobile)
                    ->get();
        return view('Admin.Reference.shop_list', compact('data'));
    }

    public function payment_list()
    {
        $data = ReferencePayment::orderBy('id', 'DESC')
                    ->where('reference_payments.reference_id', Auth::user()->id)
                    ->leftJoin('shops','reference_payments.shop_id','shops.user_id')
                    ->select('reference_payments.payment','reference_payments.comment','shops.*')
                    ->get();
        return view('Admin.Reference.payment_list', compact('data'));
    }

    public function manager()
    {
        $data = User::orderBy('id', 'DESC')->where('role', 'Employee')->get();
        return view('Admin.Reference.manager_list', compact('data'));
    }

    public function manager_store(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|digits:11|unique:users',
            'password'  => 'required|string|min:8|confirmed',
        ]);

        $data           = new User();
        $data->name     = $request->name;
        $data->mobile   = $request->mobile;
        $data->email    = $request->email;
        $data->role     = 'Employee';
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->back()->with('success',' Manager Added Successfully');
    }

    public function manager_edit(Request $request)
    {
        $data = User::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function manager_update(Request $request)
    {
        if ($request->password) 
        {
            // $request->validate([
            //     'password'  => 'required|string|min:8|confirmed',
            // ]);
            $data           = User::find($request->id);
            $data->name     = $request->name;
            $data->password = Hash::make($request->password); 
            $data->save();
        }
        else {   
            $data       = User::find($request->id);
            $data->name = $request->name;
            $data->save();
        }
        return redirect()->back()->with('message','Manager Into Updated Successfully');
    }

    public function manager_status(Request $request)
    {
        $data = User::find($request->id);
        if ($data->status == 'Active') {
            $data->status = 'Inactive';    
        }
        else{   
            $data->status = 'Active';    
        }
        $data->save();
        return redirect()->back()->with('message',' Manager Status Changed Successfully');
    }

    public function payment(Request $request)
    {
        $payment = ReferencePayment::orderBy('id', 'DESC')
                            ->leftJoin('users','reference_payments.reference_id','users.id')
                            ->leftJoin('shops','reference_payments.shop_id','shops.user_id')
                            ->select('reference_payments.*','shops.business_name as shop',
                                    'users.name as reference','users.mobile')
                            ->get();
        $reference = User::orderBy('id', 'DESC')
                        ->where('role', 'Reference')
                        ->get();
        return view('Admin.Payment.ref_pay', compact('reference','payment'));
    }

    public function ref_shop(Request $request)
    {
        $ref_shop = DB::table('shops')
                        ->where('reference_no', $request->id)
                        ->pluck('business_name','user_id');
        return response()->json($ref_shop);
    }

    public function details(Request $request)
    {
        $data = DB::table('users')
                    ->where('users.id', $request->id)
                    ->where('shop_payments.status', '=', 1)
                    ->join('shop_payments','users.id','shop_payments.shop')
                    ->select('shop_payments.price','users.id as shop_id','users.mobile')
                    ->get();
        return response()->json($data);
    }

    public function pay_confirm(Request $request)
    {
        $data               = new ReferencePayment();
        $data->reference_id = $request->reference_id;
        $data->shop_id      = $request->shop_id;
        $data->collection   = $request->collection;
        $data->payment      = $request->payment;
        $data->comment      = $request->comment;
        $data->save();
        return redirect()->back()->with('message',' Reference Payment Successfully Completed');
    }

    public function ref_pay_report(Request $request)
    {
        $request->session()->flush();
        $reference = User::orderBy('id', 'DESC')
                        ->where('role', 'Reference')
                        ->where('status', 'Active')
                        ->get();

        $d = new DateTime("now");
        $today = $d->format('Y-m-d');
        $fromdate = $request->fromdate;
        if ($request->status) {  
            $status = $request->status; 
        } else { 
            $status = 'All';
        }
        if ($request->todate) {  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        if ($status == 'All') {  
            Session::put('reference', $status);
            $data = ReferencePayment::orderBy('id', 'DESC')
                        ->join('users','reference_payments.reference_id','users.id')
                        ->join('shops','reference_payments.shop_id','shops.user_id')
                        ->select('reference_payments.*','shops.business_name as shop',
                                'users.name as reference','users.mobile')
                        ->whereBetween('reference_payments.created_at', [$fromdate, $todate])
                        ->get();
        } else { 
            $new = User::find($status);
            $refer = $new->name;
            Session::put('reference', $refer);

            $data = ReferencePayment::orderBy('id', 'DESC')
                        ->where('reference_payments.reference_id', $status)
                        ->join('users','reference_payments.reference_id','users.id')
                        ->join('shops','reference_payments.shop_id','shops.user_id')
                        ->select('reference_payments.*','shops.business_name as shop',
                        DB::raw("DATE_FORMAT(reference_payments.created_at, '%Y-%m-%d') as date"),
                                'users.name as reference','users.mobile')
                        ->whereBetween('reference_payments.created_at', [$fromdate, $todate])
                        ->get();
        }
        Session::put('fromdate', $fromdate);
        Session::put('todate', $todate);
        Session::put('status', $status);
        return view('Admin.Reference.datewise_ref_pay', 
            compact('data','fromdate','todate','status','reference'));
    }

    public function ref_pay_print(Request $request)
    {
        $status     = Session::get('status');
        $todate     = Session::get('todate');
        $fromdate   = Session::get('fromdate');
        $reference  = Session::get('reference');
        if ($status == 'All') {  
            $data = ReferencePayment::orderBy('id', 'DESC')
                        ->join('users','reference_payments.reference_id','users.id')
                        ->join('shops','reference_payments.shop_id','shops.user_id')
                        ->select('reference_payments.*','shops.business_name as shop',
                                'users.name as reference','users.mobile')
                        ->whereBetween('reference_payments.created_at', [$fromdate, $todate])
                        ->get();
        } else { 
            $data = ReferencePayment::orderBy('id', 'DESC')
                        ->where('reference_payments.reference_id', $status)
                        ->join('users','reference_payments.reference_id','users.id')
                        ->join('shops','reference_payments.shop_id','shops.user_id')
                        ->select('reference_payments.*','shops.business_name as shop',
                        DB::raw("DATE_FORMAT(reference_payments.created_at, '%Y-%m-%d') as date"),
                                'users.name as reference','users.mobile')
                        ->whereBetween('reference_payments.created_at', [$fromdate, $todate])
                        ->get();
        }
        return view('Admin.Reference.ref_pay_print', 
            compact('data','fromdate','todate','reference'));
    }

}
