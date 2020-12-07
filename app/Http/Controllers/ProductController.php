<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Product;
use Illuminate\Support\Facades\Auth;
use App\Admin\Category;
use App\Admin\Supplier;
use App\Admin\MedicineType;
use App\Admin\MedicineUnit;
use App\Admin\MedicineShelf;
use App\Imports\MedicineImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }

    public function index()
    {
        
        $data = Product::orderBy('id', 'DESC')->get();
        $category = Category::orderBy('id', 'DESC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        return view('Admin.Product.product', compact('data','category'));
    }

    public function create(){
        $categories = Category::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        return view('Admin.Product.create', compact('categories'));
    }

    public function store(Request $request){

        $user_id = Auth::user()->id;
        $status = 1;

        $this->validate(request(), [        
            'code'        => 'required|unique:products',
            'name'        => 'required|unique:products',
            'category_id' => 'required',
            'price'       => 'required',
            'mrp'         => 'required',
        ]);

        $medicine = Product::create([
            'user_id'     => $user_id,
            'code'        => $request->code,
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'minimum'     => $request->minimum,
            'maximum'     => $request->maximum,
            'discount'    => $request->discount,
            'price'       => $request->price,
            'mrp'         => $request->mrp,
            'status'      => $status,
            'shop'        => $user_id,
        ]);
       return redirect(route('product.index'))->with('success','Medicine Added Successfully');
    }


    public function edit($id){
        $data = Product::where('id',$id)->first();


        $categories = Category::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->where('status', 1)
                ->get();
        $manufacturers = Supplier::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->get();
        $medicine_types = MedicineType::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->get();
        $medicine_shelves = MedicineShelf::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->get();
        $medicine_units = MedicineUnit::orderBy('name', 'ASC')
                ->where('shop', Auth::user()->id)
                ->get();
        return view('Admin.Product.edit', compact('data','categories','manufacturers','medicine_types','medicine_shelves','medicine_units'));

    }

    public function update(Request $request, $id){
        $user_id = Auth::user()->id;
        $status = 1;
        $data = Product::where('id',$id)->first();

        $data->update([
            'user_id' => $user_id,
            'barcode' => $request->barcode,
            'name' => $request->name,
            'category' => $request->category,
            'medicine_shelf' => $request->medicine_shelf,
            'strength' => $request->strength,
            'medicine_unit' => $request->medicine_unit,
            'generic_name' => $request->generic_name,
            'min_stock' => $request->min_stock,
            'medicine_type' => $request->medicine_type,
            'details' => $request->details,
            'vat' => $request->vat,
            'tax' => $request->tax,
            'seller_price' => $request->seller_price,
            'manufacturer' => $request->manufacturer,
            'manufacturer_price' => $request->manufacturer_price,
            'status' => $status,
            'shop' => $user_id,         
        ]);
        return redirect(route('product.index'))->with('success','Medicine Updated Successfully');
    }

    public function status(Request $request){
        $data = Product::find($request->id);
        if ($data->status == '1') {
            $data->status = '0';    
        }
        else{   
            $data->status = '1';    
        }
        $data->save();
        return redirect()->back()->with('success','Medicine Status Changed Successfully');
    }

    public function destroy(Request $request){
        $data = Product::find($request->id);
        $data->delete();
        return redirect()->back()->with('danger','Product Deleted Successfully');
    }

    public function search(Request $request){
        if($request->ajax()){
            $output="";
            $products=Product::where('name','LIKE','%'.$request->search."%")->get();
            if($products) {
                foreach ($products as $key => $product) {
                    $output.= '<p>'.$product->name.'</p>';
                }
            return Response($output);
            }
        }
    }

    public function importView(){
       return view('Admin.Product.importView');
    }

    public function import( Request $request ) {
        $file  = $request->file('file');
        Excel::import(new MedicineImport,$file);
        return redirect(route('product.index'))->with('success','Data Imported Successfully');
    }

}



