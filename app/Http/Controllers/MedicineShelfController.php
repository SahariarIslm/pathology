<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\MedicineShelf;
use Illuminate\Support\Facades\Auth;

class MedicineShelfController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        $data = MedicineShelf::orderBy('id', 'DESC')
            ->where('shop', Auth::user()->id)
            ->get();
        return view('Admin.MedicineShelf.medicine', compact('data'));
    }

    public function store(Request $request)
    {
        $data           = new MedicineShelf();
        $data->name     = $request->name;
        $data->status   = '1';
        $data->shop     = Auth::user()->id;
        $data->save();
        return redirect()->back()->with('success','Medicine Shelf Added Successfully');
    }

    public function edit(Request $request)
    {
        $data = MedicineShelf::where('id', $request->id)->get();
        return response()->json($data);
    }

    public function update(Request $request)
    {
        MedicineShelf::where('id',$request->id)->update([ 'name' => $request->name ]);
        return redirect()->back()->with('message','Medicine Shelf Updated Successfully');
    }

    public function status(Request $request)
    {
        $data = MedicineShelf::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('status','Medicine Type Status Changed Successfully');
    }

    public function destroy(Request $request)
    {
        $data = MedicineShelf::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Medicine Type Deleted Successfully');
    }
}
