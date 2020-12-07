<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\Admin\Expense;
use App\Admin\ExpenseType;
use App\Admin\Sale;
use App\Admin\Purchase;
use App\Admin\SaleItem;
use App\Admin\Shop;
use App\User;

class ExpenseController extends Controller
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
        $data = Expense::orderBy('expenses.id', 'DESC')
                    ->whereBetween('expenses.date', [$fromdate, $todate])
                    ->leftJoin('users','expenses.user','users.id')
                    ->select('expenses.*','users.name as user')
                    ->where('expenses.shop', Auth::user()->id)
                    ->get();
        $Amt = $data->sum('amount');
        
        return view('Admin.Report.Expense.datewise', 
                compact('data','fromdate','todate','Amt'));
    }
    public function print_datewise(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 

        $data = Expense::orderBy('expenses.id', 'DESC')
                    ->whereBetween('expenses.date', [$fromdate, $todate])
                    ->leftJoin('users','expenses.user','users.id')
                    ->select('expenses.*','users.name as user')
                    ->where('expenses.shop', Auth::user()->id)
                    ->get();
        $Amt = $data->sum('amount');
        
        return view('Admin.Report.Expense.print_datewise', 
                compact('company','data','fromdate','todate','Amt'));
    }

    public function profit_loss(Request $request)
    {
        $d = new DateTime("now");
        $today = $d->format('Y-m-d');

        $fromdate = $request->fromdate;
        if ($request->todate){  
            $todate = $request->todate; 
        } else { 
            $todate = $today; 
        }

        // $sale = Sale::orderBy('id', 'DESC')
        //             ->whereBetween('date', [$fromdate, $todate])
        //             ->where('shop', Auth::user()->shop)
        //             ->get();
        // $tSal = $sale->sum('subTotal');
        
        // $purchase = Purchase::orderBy('id', 'DESC')
        //             ->whereBetween('date', [$fromdate, $todate])
        //             ->where('shop', Auth::user()->shop)
        //             ->get();
        // $tPur = $purchase->sum('subTotal');

        // $sales = DB::table('sale_items')
        //             ->whereBetween('date', [$fromdate, $todate])
        //             ->where('shop', Auth::user()->shop)
        //             ->get();
        // $tP = 0;
        // $tS = 0;
        // if ($sales->qty != 0) 
        // {
        //     foreach ($sales as $sales) {
        //         $cost   = $sales->cost * $sales->qty;
        //         $price  = $sales->price * $sales->qty;
        //     }
        //     $tP = $cost++;
        //     $tS = $price++;
        // }
        
        $sales = DB::table('sale_items')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tP = $sales->sum('tCost');
        $tS = $sales->sum('total');

        $expense = Expense::orderBy('id', 'DESC')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tExp = $expense->sum('amount');

        $gPft = $tS - $tP;
        $pLos = $gPft - $tExp;

        return view('Admin.Report.Profit&Loss.new_profit_loss', 
                compact('fromdate','todate','tS','tP','tExp','gPft','pLos'));
    }
    
    public function profit_loss_print(Request $request)
    {
        $company = Shop::where('user_id', Auth::user()->id)->get();
        $fromdate = $request->fromdate;
        $todate = $request->todate; 

        $sale = Sale::orderBy('id', 'DESC')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tSal = $sale->sum('subTotal');
        
        $purchase = Purchase::orderBy('id', 'DESC')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tPur = $purchase->sum('subTotal');

        $expense = Expense::orderBy('id', 'DESC')
                    ->whereBetween('date', [$fromdate, $todate])
                    ->where('shop', Auth::user()->id)
                    ->get();
        $tExp = $expense->sum('amount');

        $gPft = $tSal - $tPur;
        $pLos = $gPft - $tExp;

        return view('Admin.Report.Profit&Loss.print_profit_loss', 
                compact('company','fromdate','todate','tSal','tPur','tExp','gPft','pLos'));
    }


}
