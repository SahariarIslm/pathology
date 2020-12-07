<?php

namespace App\Http\Controllers;

use App\Admin\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('inactiveShop');
    //     $this->middleware('can:superAdmin');
    // }

    public function index()
    {
        $data = Subscriber::orderBy('id', 'DESC')->get();
        return view('Admin.Shop.subscriber', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Subscriber();
        $data->email = $request->email;
        $data->save();
        return redirect()->back()->with('success','Subscriber Added Successfully');
    }
}
