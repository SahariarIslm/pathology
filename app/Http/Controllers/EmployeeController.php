<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
        // $this->middleware('can:admin');
    }

    public function index()
    {
        // if(Gate::denies('admin')){
        // if(Gate::allows('admin')){
            $data = User::orderBy('id', 'DESC')
                    ->where('shop_id', Auth::user()->id)
                    ->join('shop_employees','users.id','shop_employees.employee_id')
                    ->select('users.*')
                    ->get();
            return view('Admin.Employee.employee', compact('data'));
        // }
        // return redirect()->back()->with('message','You Do not Have Access !!!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobile'    => 'required|digits:11|unique:users',
            'password'  => 'required|string|confirmed|min:8',
        ]);

        $data           = new User();
        $data->name     = $request->name;
        $data->mobile   = $request->mobile;
        $data->role     = $request->role;
        $data->status   = 'Active';
        $data->password = Hash::make($request->password);
        $data->save();

        $new = DB::table('shop_employees')
                    ->insert([
                            'shop_id'       => Auth::user()->id,
                            'employee_id'   => $data->id,
                        ]);
        return redirect()->back()->with('message','Employee Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = User::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        // User::where('id',$request->id)
        //     ->update([
        //                 'name'      => $request->name,
        //                 'role'      => $request->role,
        //                 'password'  => Hash::make($request->password),
        //             ]);
        $data           = User::find($request->id);
        $data->name     = $request->name;
        $data->role     = $request->role;
        $data->password = Hash::make($request->password);
        $data->save();
        return redirect()->back()->with('message','Employee Into Updated Successfully');
    }
    
    public function status(Request $request)
    {
        $data = User::find($request->id);
        if ($data->status == 'Active') {
            $data->status = 'Inactive';    
        }
        else{   
            $data->status = 'Active';    
        }
        $data->save();
        return redirect()->back()->with('message','Employee Status Changed Successfully');
    }

    public function change_password(Request $request)
    {
        return view('Admin.Employee.change_password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password'  => 'required|string|confirmed|min:8',
        ]);
        User::where('id', Auth::user()->id)->update([ 'password' => Hash::make($request->password) ]);
        return redirect()->action('EmployeeController@logout');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->loggedOut($request) ?: redirect('/');
    }
    protected function loggedOut(Request $request)
    {
        //
    }
    protected function guard()
    {
        return Auth::guard();
    }

}
