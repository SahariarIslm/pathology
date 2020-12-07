<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Expense;
use App\Admin\ExpenseType;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:admin');
    }

    public function index()
    {
        $today = date('Y-m-d');
        $expenseT = ExpenseType::where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $expenseTy = ExpenseType::where('status',1)
                ->where('shop', Auth::user()->id)
                ->get();
        $data = Expense::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.Expense.expense', compact('data','expenseT','expenseTy','today'));
    }

    public function store(Request $request)
    {
        $data = new Expense();
        $data->date = $request->date;
        $data->expense_type = $request->expense_type;
        $data->amount = $request->amount;
        $data->details = $request->details;
        $data->shop = Auth::user()->id;
        $data->user = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Expense Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Expense::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Expense::where('id',$request->id)
            ->update([  
                        'date'          => $request->date,  
                        'expense_type'  => $request->expense_type,  
                        'amount'        => $request->amount,  
                        'details'       => $request->details,  
                    ]);
        return redirect()->back()->with('message','Expense Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Expense::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Expense Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Expense::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Expense Deleted Successfully');
    }

}
