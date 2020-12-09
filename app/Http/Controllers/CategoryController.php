<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = Category::orderBy('id', 'DESC')
                        ->where('shop', Auth::user()->id)
                        ->get();
        return view('Admin.Category.category', compact('data'));
    }

    public function store(Request $request)
    {
        $data           = new Category();
        $data->name     = $request->name;
        $data->status   = '1';
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Category Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Category::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Category::where('id',$request->id)->update([ 'name' => $request->name ]);
        return redirect()->back()->with('message','Category Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = Category::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Category Status Changed Successfully');
    }

    public function destroy($id)
    {
        $data = Category::find($id)->delete();
        return redirect()->back()->with('danger','Category Deleted Successfully');
    }
    
}
