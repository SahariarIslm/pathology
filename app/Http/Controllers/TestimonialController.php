<?php

namespace App\Http\Controllers;

use App\Admin\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        if (Gate::allows('superAdmin')) {
            $data = Testimonial::orderBy('id', 'DESC')->get();
        }
        else { 
            $data = Testimonial::orderBy('id', 'DESC')
                            ->where('user_id', Auth::user()->id)
                            ->get();
        }
        return view('Admin.Shop.testimonial', compact('data'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('picture')) 
        {
            $image = $request->file('picture');
            $imagename = uniqid().$image->getClientOriginalName();
            $uploadPath = 'public/Testimonial/';
            $image->move($uploadPath,$imagename);
            $imageUrl = $uploadPath.$imagename; 
        }
        else{
            $imageUrl = null;
        }
        $data           = new Testimonial();
        $data->user_id  = Auth::user()->id;
        $data->b_name   = $request->b_name;
        $data->name     = $request->name;
        $data->comment  = $request->comment;
        $data->picture  = $imageUrl;
        $data->save();
        return redirect()->back()->with('success','Testimonial Added Successfully');
    }

    public function status(Request $request)
    {
        $data = Testimonial::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Testimonial Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Testimonial::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Testimonial Deleted Successfully');
    }
}
