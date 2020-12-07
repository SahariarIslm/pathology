<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\ExpenseType;
use Illuminate\Support\Facades\Auth;

class ExpenseTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:admin');
    }

    public function index()
    {
        $data = ExpenseType::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.Expense.expense_type', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new ExpenseType();
        $data->name = $request->name;
        $data->shop = Auth::user()->id;
        $data->user = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Expense Type Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = ExpenseType::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        ExpenseType::where('id',$request->id)->update([  'name'  => $request->name   ]);
        return redirect()->back()->with('success','Expense Type Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = ExpenseType::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Expense Type Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = ExpenseType::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Expense Type Deleted Successfully');
    }

}
