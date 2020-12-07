<?php

namespace App\Http\Controllers;

use App\Admin\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        $this->middleware('can:superAdmin');
    }

    public function index()
    {
        $data = Message::orderBy('id', 'DESC')->get();
        return view('Admin.Home.message', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new Message();
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('success','Message Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = Message::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Message::where('id',$request->id)->update([  'message'   =>  $request->message   ]);
        return redirect()->back()->with('message','Message Updated Successfully');
    }

    public function destroy(Request $request)
    {
        $data = Message::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Message Deleted Successfully');
    }
}
