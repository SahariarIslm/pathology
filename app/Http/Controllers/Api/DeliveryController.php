<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Delivery;

class DeliveryController extends Controller
{
    public function index()
    {
        $data = Delivery::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $data = new Delivery();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->status = '1';
        $data->shop = $request->shop;
        $data->save();
        return response()->json($data);
    }

    public function edit(Request $request)
    {
        $data = Delivery::find($request->id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        Delivery::where('id',$request->id)
            ->update([
                    'name'    => $request->name,
                    'mobile'  => $request->mobile,
                    'address' => $request->address,
                ]);
        $msg = 'Updated Successfully';
        return response()->json($msg);
    }

    public function status(Request $request)
    {
        $data = Delivery::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        $msg = 'Status Changed Successfully';
        return response()->json($msg);
    }

    public function delete(Request $request)
    {
        $data = Delivery::find($request->id);
        $data->delete();
        $msg = 'Delete Successfully';
        return response()->json($msg);
    }
}
