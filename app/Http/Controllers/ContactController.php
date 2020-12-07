<?php

namespace App\Http\Controllers;

use App\Admin\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::orderBy('id', 'DESC')->get();
        return view('Admin.Shop.contact', compact('contact'));
    }

    public function store(Request $request)
    {
        $data           = new Contact();
        $data->name     = $request->name;
        $data->email    = $request->email;
        $data->mobile   = $request->mobile;
        $data->subject  = $request->subject;
        $data->message  = $request->message;
        $data->save();
        return redirect('/#contact-section')->with('message','Your Message Received Successfully');
    }


}
