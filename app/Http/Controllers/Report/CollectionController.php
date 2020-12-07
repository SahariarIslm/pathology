<?php

namespace App\Http\Controllers\Report;

use App\Admin\Collection;
use App\Admin\Delivery;
use App\Admin\Shop;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
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
        $data = Collection::orderBy('collections.id', 'DESC')
                    ->where('collections.shop', Auth::user()->id)
                    ->whereBetween('collections.date', [$fromdate, $todate])
                    ->leftJoin('customers','collections.customer','customers.id')
                    ->leftJoin('deliveries','collections.delivery','deliveries.id')
                    ->select('collections.*','customers.name as custo','deliveries.name as deliver')
                    ->get();
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        
        return view('Admin.Report.Collection.datewise', 
                compact('data','fromdate','todate','Paid','Due'));
    }
    
    public function print_datewise(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 

        $data = Collection::orderBy('collections.id', 'DESC')
                    ->where('collections.shop', Auth::user()->id)
                    ->whereBetween('collections.date', [$fromdate, $todate])
                    ->leftJoin('customers','collections.customer','customers.id')
                    ->leftJoin('deliveries','collections.delivery','deliveries.id')
                    ->select('collections.*','customers.name as custo','deliveries.name as deliver')
                    ->get();
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        
        return view('Admin.Report.Collection.print_datewise', 
                compact('company','data','fromdate','todate','Paid','Due'));
    }
    public function delivery(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }
        $deliver = $request->deliver;

        $delivery = Delivery::orderBy('id', 'DESC')->where('shop', Auth::user()->id)->get();
        $data = Collection::orderBy('collections.id', 'DESC')
                    ->where('collections.shop', Auth::user()->id)
                    ->where('collections.delivery', $deliver)
                    ->whereBetween('collections.date', [$fromdate, $todate])
                    ->leftJoin('customers','collections.customer','customers.id')
                    ->leftJoin('deliveries','collections.delivery','deliveries.id')
                    ->select('collections.*','customers.name as custo','deliveries.name as deliver')
                    ->get();
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        
        return view('Admin.Report.Collection.delivery_system_wise', 
                compact('delivery','deliver','data','fromdate','todate','Paid','Due'));
    }
    public function print_delivery(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 

        $data = Collection::orderBy('collections.id', 'DESC')
                    ->where('collections.shop', Auth::user()->id)
                    ->whereBetween('collections.date', [$fromdate, $todate])
                    ->leftJoin('customers','collections.customer','customers.id')
                    ->leftJoin('deliveries','collections.delivery','deliveries.id')
                    ->select('collections.*','customers.name as custo','deliveries.name as deliver')
                    ->get();
        $Paid = $data->sum('paid');
        $Due = $data->sum('due');
        
        return view('Admin.Report.Collection.print_delivery_system_wise', 
                compact('company','data','fromdate','todate','Paid','Due'));
    }

}
