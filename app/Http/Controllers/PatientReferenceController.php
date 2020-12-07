<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Category;
use Illuminate\Support\Facades\Auth;

class PatientReferenceController extends Controller
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
        return view('Admin.PatientReference.reference', compact('data'));
    }
}
