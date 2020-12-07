<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\ShopPackage;
use App\Admin\Testimonial;

class FrontEndController extends Controller
{
    public function frontend()
    {
        $testimonial = Testimonial::orderBy('id', 'DESC')->where('status', 1)->get();
        return view('FrontEnd.frontend', compact('testimonial'));
    }
    
    public function inactive()
    {
        $today = date('Y-m-d');
        $package = ShopPackage::orderBy('id', 'DESC')
                ->where('status', 1)
                ->get();
        return view('Admin.Home.inactive', compact('today','package'));
    }

}
