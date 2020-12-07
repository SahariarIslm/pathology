<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin\Supplier;
use Illuminate\Support\Facades\Auth;
use App\Admin\Purchase;
use App\Admin\PurchaseItem;
use App\Admin\Product;

class PurchaseEditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('inactiveShop');
    }
    
    public function new_index()
    {
        $product = Product::orderBy('products.id', 'DESC')
                ->where('products.shop', Auth::user()->shop)
                ->where('products.status', 1)
                ->join('categories','products.category','categories.id')
                ->select('products.*','categories.name as categoryname')
                ->where('categories.status', 1)
                ->get();
        $data = Purchase::orderBy('purchases.id', 'DESC')
            ->where('purchases.shop', Auth::user()->shop)
            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
            ->leftJoin('purchase_cancels','purchases.purchase_no','purchase_cancels.purchase_no')
            ->select('purchases.*')
            ->where('purchase_cancels.purchase_no', null)
            ->get();
        return view('Admin.Purchase.purchase_new_edit', compact('data','product'));
    }
    public function search(Request $request)
    {
        $data = $data = Purchase::where('purchases.purchase_no', $request->id)
                ->where('purchases.shop', Auth::user()->shop)
                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                ->leftJoin('purchase_cancels','purchases.purchase_no','purchase_cancels.purchase_no')
                ->select('purchases.*','suppliers.name as supp')
                ->where('purchase_cancels.purchase_no', null)
                ->get();
        \Cart::clear();
        $details = PurchaseItem::where('purchase_no', $request->id)->get();
        foreach ($details as $detail) {
            \Cart::add(array(
                'id'         => $detail->code, 
                'name'       => $detail->name,
                'price'      => $detail->cost,
                'quantity'   => $detail->qty,
                // 'quantity'   => array(
                //     'relative' => false,
                //     'value' => $detail->qty
                // ),
            ));
        }
        return response()->json($data);
    }


    public function index()
    {
        $data = Purchase::orderBy('purchases.id', 'DESC')
            ->where('purchases.shop', Auth::user()->shop)
            ->leftJoin('suppliers','purchases.supplier','suppliers.id')
            ->leftJoin('purchase_cancels','purchases.purchase_no','purchase_cancels.purchase_no')
            ->select('purchases.*','suppliers.name as supplie')
            ->where('purchase_cancels.purchase_no', null)
            ->get();
        return view('Admin.Purchase.purchase_edit', compact('data'));
    }
    public function back()
    {
        \Cart::clear();
        return redirect()->route('purchase.edit.list');
    }
    public function details(Request $request)
    {
        $product = Product::orderBy('products.id', 'DESC')
                ->where('products.shop', Auth::user()->shop)
                ->where('products.status', 1)
                ->join('categories','products.category','categories.id')
                ->select('products.*','categories.name as categoryname')
                ->where('categories.status', 1)
                ->get();
        $data = Purchase::where('purchases.purchase_no', $request->id)
                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                ->select('purchases.*','suppliers.name as supplie','suppliers.mobile as mobil')
                ->get();
        $details = PurchaseItem::where('purchase_no', $request->id)->get();
        foreach ($details as $detail) {
            \Cart::add(array(
                'id'         => $detail->code, 
                'name'       => $detail->name,
                'price'      => $detail->cost,
                'quantity'   => $detail->qty,
                // 'quantity'   => array(
                //     'relative' => false,
                //     'value' => $detail->qty
                // ),
            ));
        }
        return view('Admin.Purchase.purchase_edit_details', compact('product','data','details'));
    }
    public function add_item(Request $request)
    {
        $products = Product::find($request->id);
        // \Cart::session(Auth::user()->id)->add(array(
        \Cart::add(array(
            'id'         => $products->code, 
            'name'       => $products->name,
            'price'      => '',
            'quantity'   => 1,
        ));
        $msg = "Product Added to Cart Successfully ....";
        $request->session()->flash('status', $msg);
    }
    public function add_qty(Request $request)
    {
        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));
        $msg = "Quantity Updated Successfully ....";
        $request->session()->flash('status', $msg);
    }
    public function add_price(Request $request)
    {
        \Cart::update($request->id, array(
            'price' => $request->price
        ));
        $msg = "Price Updated Successfully ....";
        $request->session()->flash('message', $msg);
    }
    public function remove(Request $request)
    {
        \Cart::remove($request->id);
        return redirect()->back()->with('warning','Product Removed from Cart...');
    }

    public function clean(Request $request)
    {
        \Cart::clear();
        $product = Product::orderBy('products.id', 'DESC')
                ->where('products.shop', Auth::user()->shop)
                ->where('products.status', 1)
                ->join('categories','products.category','categories.id')
                ->select('products.*','categories.name as categoryname')
                ->where('categories.status', 1)
                ->get();
        $data = Purchase::where('purchases.purchase_no', $request->id)
                ->leftJoin('suppliers','purchases.supplier','suppliers.id')
                ->select('purchases.*','suppliers.name as supplie','suppliers.mobile as mobil')
                ->get();
        return view('Admin.Purchase.purchase_edit_details', compact('product','data'));
        // return redirect()->back()->with('danger','All Products Cleared from Cart...');
    }
}
