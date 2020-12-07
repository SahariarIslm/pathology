<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

///----------------------- New Login & Register -----------------------
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');


Route::group(['middleware' => 'auth:api'], function(){

	//-------------------------- checkin ------------------------
	Route::prefix('checkin')->name('checkin.')->group(function () {
	    Route::get('/index', 'API\CheckinController@index')->name('index');
	    Route::any('/entry', 'API\CheckinController@entry')->name('entry');
	    Route::any('/getClient', 'API\CheckinController@getClient')->name('getClient');
	    Route::any('/add', 'API\CheckinController@store')->name('checkin');
	    Route::any('/clientRegister', 'API\CheckinController@clientRegister')->name('clientRegister');
	    Route::get('/checkout', 'API\CheckinController@checkout')->name('checkout');
	});
	
});

// ///----------------------- Login & Register -----------------------
// /// Shop Admin
// Route::post('shop_register','Api\UserController@shop_register');
// Route::get('admin_login','Api\UserController@admin_login');
// /// Shop Employee
// Route::get('employee_login','Api\UserController@employee_login');
// Route::post('employee_register','Api\UserController@employee_register');

// ///----------------------- Employee -----------------------
// Route::get('employee_index','Api\UserController@employee_index');
// Route::get('employee_status','Api\UserController@employee_status');

// ///----------------------- Supplier -----------------------
// Route::get('supplier_index','Api\SupplierController@index');
// Route::post('supplier_store','Api\SupplierController@store');
// Route::get('supplier_edit','Api\SupplierController@edit');
// Route::post('supplier_update','Api\SupplierController@update');
// Route::get('supplier_status','Api\SupplierController@status');
// Route::get('supplier_delete','Api\SupplierController@delete');

// ///----------------------- Customer -----------------------
// Route::get('customer_index','Api\CustomerController@index');
// Route::post('customer_store','Api\CustomerController@store');
// Route::get('customer_edit','Api\CustomerController@edit');
// Route::post('customer_update','Api\CustomerController@update');
// Route::get('customer_status','Api\CustomerController@status');
// Route::get('customer_delete','Api\CustomerController@delete');

// ///----------------------- Delivery -----------------------
// Route::get('delivery_index','Api\DeliveryController@index');
// Route::post('delivery_store','Api\DeliveryController@store');
// Route::get('delivery_edit','Api\DeliveryController@edit');
// Route::post('delivery_update','Api\DeliveryController@update');
// Route::get('delivery_status','Api\DeliveryController@status');
// Route::get('delivery_delete','Api\DeliveryController@delete');

// ///----------------------- Category -----------------------
// Route::get('category_index','Api\CategoryController@index');
// Route::post('category_store','Api\CategoryController@store');
// Route::get('category_edit','Api\CategoryController@edit');
// Route::post('category_update','Api\CategoryController@update');
// Route::get('category_status','Api\CategoryController@status');
// Route::get('category_delete','Api\CategoryController@delete');

// ///----------------------- Product -----------------------
// Route::get('product_index','Api\ProductController@index');
// Route::post('product_store','Api\ProductController@store');
// Route::get('product_edit','Api\ProductController@edit');
// Route::post('product_update','Api\ProductController@update');
// Route::get('product_status','Api\ProductController@status');
// Route::get('product_delete','Api\ProductController@delete');

// ///----------------------- Purchase -----------------------
// Route::get('purchase_no','Api\PurchaseController@purchase_no');
// Route::post('purchase','Api\PurchaseController@purchase');
// Route::post('purchase_item','Api\PurchaseController@purchase_item');
// Route::post('purchase_stock','Api\PurchaseController@purchase_stock');
// //Report
// Route::get('purchase_report','Api\PurchaseController@purchase_report');
// Route::get('purchase_item_report','Api\PurchaseController@purchase_item_report');
// Route::get('purchase_date_wise','Api\PurchaseController@purchase_date_wise');

// ///----------------------- Stock -----------------------
// Route::get('stock','Api\PurchaseController@stock');

// ///----------------------- Sale -----------------------
// Route::get('sale_no','Api\SaleController@sale_no');
// Route::post('sale','Api\SaleController@sale');
// Route::post('sale_item','Api\SaleController@sale_item');
// //Report
// Route::get('sale_report','Api\SaleController@sale_report');
// Route::get('sale_item_report','Api\SaleController@sale_item_report');
// Route::get('sale_date_wise','Api\SaleController@sale_date_wise');

// ///----------------------- Expense -----------------------
// //Expense Type
// Route::get('expense_type','Api\ExpenseController@type');
// Route::post('expense_type_store','Api\ExpenseController@type_store');
// Route::get('expense_type_edit','Api\ExpenseController@type_edit');
// Route::post('expense_type_update','Api\ExpenseController@type_update');
// Route::get('expense_type_status','Api\ExpenseController@status');
// //Expense
// Route::get('expense_index','Api\ExpenseController@index');
// Route::post('expense_store','Api\ExpenseController@store');
// Route::get('expense_edit','Api\ExpenseController@edit');
// Route::post('expense_update','Api\ExpenseController@update');

// ///----------------------- Payment -----------------------
// Route::get('payment_index','Api\PaymentController@index');
// Route::post('payment_store','Api\PaymentController@store');
// Route::get('payment_edit','Api\PaymentController@edit');
// Route::post('payment_update','Api\PaymentController@update');

// ///----------------------- Collection -----------------------
// Route::get('collection_index','Api\CollectionController@index');
// Route::post('collection_store','Api\CollectionController@store');
// Route::get('collection_edit','Api\CollectionController@edit');
// Route::post('collection_update','Api\CollectionController@update');

