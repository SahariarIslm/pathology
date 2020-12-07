<?php

namespace App\Http\Controllers;

use App\Admin\Collection;
use App\Admin\Expense;
use App\Admin\Payment;
use App\Admin\Purchase;
use App\Admin\Sale;
use App\Admin\SaleItem;
use App\Admin\Shop;
use App\Admin\HourlyEntry;
use App\Admin\MonthlyCheckin;
use App\Admin\Checkin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $today = date('Y-m-d');

        // $purchase = Purchase::where('date', $today)
        //         ->where('shop', Auth::user()->shop)
        //         ->get();
        // $tPur = $purchase->sum('payable');

        // $sale = Sale::where('date', $today)
        //         ->where('shop', Auth::user()->shop)
        //         ->get();
        // $tSal = $sale->sum('payable');
		
        // $cost = SaleItem::where('sale_items.date', $today)
        //         ->where('sale_items.shop', Auth::user()->shop)
        //         ->where('stocks.shop', Auth::user()->shop)
        //         ->join('stocks','sale_items.code','stocks.code')
        //         ->select('sale_items.qty','stocks.cost')
        //         ->get();
				
        // $purqty = SaleItem::where('date', $today)
        //         ->where('sale_items.shop', Auth::user()->shop)
        //         ->join('stocks','sale_items.code','stocks.code')
        //         ->select('sale_items.qty')
        //         ->get();
        // $tCos = $purcost->first('cost');
        // $tQty = $purqty->first('qty');
        // $tPur = $tCos * $tQty;
		
		/* if ($cost != null) {
			foreach ($cost as $cos) {
				$tCost = $cos->cost * $cos->qty;
			}
			$tP = $tCost++;
		} else {
			$tP = 0;
		} */
		
        /* foreach ($cost as $cos) 
        {
            $tCost = $cos->cost * $cos->qty;
        }
        $tP = $tCost++; */
		// $tP = 0;

		/* if ($tP != null) {
			$gross = $tSal - $tP;
		} else {
			$gross = 0;
        } */
        
        $sales = DB::table('sale_items')
                    ->where('date', $today)
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tPur = $sales->sum('tCost');
        $tSal = $sales->sum('total');
		$gross = $tSal - $tPur;

        $collection = Collection::where('date', $today)
                ->where('shop', Auth::user()->id)
                ->get();
        $tCol = $collection->sum('amount');

        $payment = Payment::where('date', $today)
                ->where('shop', Auth::user()->id)
                ->get();
        $tPay = $payment->sum('amount');

        $expense = Expense::where('date', $today)
                ->where('shop', Auth::user()->id)
                ->get();
        $tExp = $expense->sum('amount');
        
        $start = new Carbon('first day of this month');
        $end = new Carbon('last day of this month');
        // $start = new Carbon('first day of this month');
        // $start->startOfMonth();
        // $end = new Carbon('last day of this month');
        // $end->endOfMonth();
        $tMsr = DB::table('users')
                ->where('role', '=', 'Admin')
                ->whereBetween('created_at', [$start, $end])
                ->count();

        $tRs = DB::table('users')->where('role', '=', 'Admin')->count();
        
        $tAs = DB::table('users')
                ->where('role', '=', 'Admin')
                ->where('status', '=', 'Active')
                ->count();

        $tIs = DB::table('users')
                ->where('role', '=', 'Admin')
                ->where('status', '=', 'Inactive')
                ->count();

        $tDps = DB::table('users')
                ->where('role', '=', 'Admin')
                ->where('package', '=', 'Free Demo Package')
                ->where('shop_payments.status', '=', 1)
                ->join('shop_payments','users.id','shop_payments.shop')
                ->select('shop_payments.package','shop_payments.status','users.role')
                ->count();

        $Rtrs = DB::table('users')
                ->where('role', 'Admin')
                ->where('shops.reference_no', Auth::user()->mobile)
                ->join('shops','users.id','shops.user_id')
                ->select('shops.reference_no','users.role','users.status')
                ->count();

        $Rtas = DB::table('users')
                ->where('role', 'Admin')
                ->where('status', 'Active')
                ->where('shops.reference_no', Auth::user()->mobile)
                ->join('shops','users.id','shops.user_id')
                ->select('shops.reference_no','users.role','users.status')
                ->count();

        $Rtis = DB::table('users')
                ->where('role', 'Admin')
                ->where('status', 'Inactive')
                ->where('shops.reference_no', Auth::user()->mobile)
                ->join('shops','users.id','shops.user_id')
                ->select('shops.reference_no','users.role','users.status')
                ->count();
                
        $new = DB::table('users')
                ->where('role', '=', 'Admin')
                ->where('shop_payments.status', '=', 1)
                ->where('shops.reference_no', Auth::user()->mobile)
                ->join('shops','users.id','shops.user_id')
                ->join('shop_payments','users.id','shop_payments.shop')
                ->select('shop_payments.status','shops.reference_no','users.role')
                ->get();
        $Rtp = $new->sum('price') * 10/100;
        $hourlyEntries = HourlyEntry::where('checkin',1)
            ->where('checkout',0)
            ->orderBy('id', 'DESC')
            ->get();
        $data = Checkin::where('checkin',1)
                    ->where('shop', Auth::user()->id)
                    ->orderBy('checkout', 'ASC')
                    ->orderBy('id', 'DESC')
                    ->get();
        $hourlyPrice   = HourlyEntry::where('checkin',1)->whereDate('created_at', date('Y-m-d'))->sum('price');
        $hourlyPenalty = HourlyEntry::where('checkin',1)->whereDate('created_at', date('Y-m-d'))->sum('penalty');
        $totalPrice    = $hourlyPrice + $hourlyPenalty;

        $todayHcheckin = count(HourlyEntry::whereDate('created_at', date('Y-m-d'))->get());
        $todayMcheckin = count(MonthlyCheckin::whereDate('created_at', date('Y-m-d'))->get());
        $totalCheckin  = $todayHcheckin + $todayMcheckin;
        
        return view('Admin.Home.dashboard', compact('tPur','tSal','tCol','tPay','tExp',
                    'gross','tMsr','tRs','tAs','tIs','tDps','Rtrs','Rtas','Rtis','Rtp','hourlyEntries','data','todayHcheckin','todayMcheckin','totalCheckin','totalPrice'));
    }
    
    public function profile()
    {
        if(Gate::allows('superAdmin')){
            return view('Admin.Profile.superAdmin');
        }
        if(Gate::allows('admin')){
            $shop = Shop::where('user_id', Auth::user()->id)->get();
            $districts = DB::table('districts')->orderBy('id','asc')->get();
            return view('Admin.Profile.admin', compact('shop','districts'));
        }
        elseif(Gate::allows('manager')){
            return view('Admin.Profile.employee');
        }
        elseif(Gate::allows('salesMan')){
            return view('Admin.Profile.employee');
        }
    }

    public function update(Request $request)
    {
        if ($request->name) {  
            User::find(Auth::user()->id)
                ->update([ 'name' => $request->name ]); 
        }
        if ($request->business_name) { 
            Shop::where('user_id', Auth::user()->id)
                ->update([ 'business_name' => $request->business_name ]); 
        }
        if ($request->b_type) { 
            Shop::where('user_id', Auth::user()->id)
                ->update([ 'business_type' => $request->b_type ]); 
        }
        if ($request->area) { 
            Shop::where('user_id', Auth::user()->id)
                ->update([ 'area' => $request->area ]); 
        }
        if ($request->address) { 
            Shop::where('user_id', Auth::user()->id)
                ->update([ 'address' => $request->address ]); 
        }
        // $data = User::find(Auth::user()->id);
        // $data->name = $request->name;
        // $data->business_name = $request->business_name;
        // $data->area = $request->area;
        // $data->b_type = $request->b_type;
        // $data->save();    
        return redirect()->back()->with('status', 'Profile Updated Successfully!!');     
    }
    public function epdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->save();    
        return redirect()->back()->with('status', 'Profile Updated Successfully!!');     
    }


}
