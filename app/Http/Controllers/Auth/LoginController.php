<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/home';
    // protected function redirectTo()
    // {
        // if(Gate::allows('admin')){
        //     return route('home');
        // }
        // elseif(Gate::allows('manager')){
        //     return route('home'); 
        // }
        // elseif(Gate::allows('salesMan')){
        //     return route('home'); 
        // } else {   
        //     return route('inactive');
        // }
        // if (Auth::user()->status == 'Inactive') {
        //     return route('inactive');
        // } elseif (Auth::user()->status == 'Active') {
        //     return route('home');
        // } else {
        //     return route('frontend');
        // }
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
