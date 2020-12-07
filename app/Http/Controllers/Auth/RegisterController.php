<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Shop;
use App\Admin\ShopPayment;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // $reference = User::where('role', 'Reference')->get('mobile');
        $ref = User::where('role', 'Reference')->first();
        $reference = $ref->mobile;
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile'        => ['required', 'digits:11', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'reference_no'  => ['nullable', Rule::in([ $reference ])],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $today = date('Y-m-d');
        $user = User::create([
            'name'              => $data['name'],
            'mobile'            => $data['mobile'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
        ]);

        $shop                   = new Shop();
        $shop->user_id          = $user->id;
        $shop->business_name    = $data['business_name'];
        $shop->business_type    = $data['b_type'];
        $shop->reference_no     = $data['reference_no'];
        $shop->area             = $data['area'];
        $shop->address          = $data['address'];
        $shop->save();

        $pay           = new ShopPayment();
        $pay->date     = $today;
        $pay->package  = 'Free Demo Package';
        $pay->price    = '0';
        $pay->days     = '15';
        $pay->shop     = $user->id;
        $pay->save();

        return $user;
    }
}
