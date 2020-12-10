<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontEndController@frontend')->name('frontend');

Auth::routes();

Route::get('/inactive', 'FrontEndController@inactive')->middleware('auth')->name('inactive');

Route::get('/home', 'HomeController@index')->name('home');

///Profile
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::post('/profile-update', 'HomeController@update')->name('profile.update');
Route::post('/profile-epdate', 'HomeController@epdate')->name('profile.epdate');

//-------------------------- Message ------------------------
Route::prefix('message')->name('message.')->group(function () {
    Route::get('/index', 'MessageController@index')->name('index');
    Route::post('/store', 'MessageController@store')->name('store');
    Route::get('/edit', 'MessageController@edit')->name('edit');
    Route::post('/update', 'MessageController@update')->name('update');
    Route::get('/status', 'MessageController@status')->name('status');
    Route::get('/delete', 'MessageController@destroy')->name('destroy');
});

//------------------------ Testimonial ----------------------
Route::prefix('testimonial')->name('testimonial.')->group(function () {
    Route::get('/index', 'TestimonialController@index')->name('index');
    Route::post('/store', 'TestimonialController@store')->name('store');
    Route::get('/edit', 'TestimonialController@edit')->name('edit');
    Route::post('/update', 'TestimonialController@update')->name('update');
    Route::get('/status', 'TestimonialController@status')->name('status');
    Route::get('/delete', 'TestimonialController@destroy')->name('destroy');
});

//-------------------------- Contact ------------------------
Route::prefix('contact')->name('contact.')->group(function () {
    Route::get('/index', 'ContactController@index')
            ->middleware('auth','inactiveShop','can:superAdmin')->name('index');
    Route::post('/submit', 'ContactController@store')->name('store');
});

//-------------------------- Subscriber ------------------------
Route::prefix('subscriber')->name('subscriber.')->group(function () {
    Route::get('/index', 'SubscriberController@index')
            ->middleware('auth','inactiveShop','can:superAdmin')->name('index');
    Route::post('/store', 'SubscriberController@store')->name('store');
    Route::get('/status', 'SubscriberController@status')->name('status');
    Route::get('/delete', 'SubscriberController@destroy')->name('destroy');
});

//-------------------------- Shop ------------------------
Route::prefix('shop')->name('shop.')->group(function () {
    Route::get('/list', 'ShopController@index')->name('index');
    Route::post('/add', 'ShopController@store')->name('store');
    Route::get('/edit', 'ShopController@edit')->name('edit');
    Route::post('/update', 'ShopController@update')->name('update');
    Route::get('/status', 'ShopController@status')->name('status');
    Route::get('/delete', 'ShopController@destroy')->name('destroy');
    Route::get('/reference', 'ShopController@reference')->name('reference');
    Route::post('/reference-store', 'ShopController@reference_store')->name('reference.store');
    Route::get('/reference-status', 'ShopController@reference_status')->name('reference.status');
});

//-------------------------- Reference ------------------------
Route::prefix('reference')->name('reference.')->group(function () {
    Route::get('/edit', 'ReferenceController@reference_edit')->name('edit');
    Route::post('/update', 'ReferenceController@reference_update')->name('update');
    Route::get('/payment-list', 'ReferenceController@payment_list')->name('payment.list');
    Route::get('/shop-list', 'ReferenceController@shop_list')->name('shop.list');
    Route::get('/payment', 'ReferenceController@payment')->name('payment');
    Route::get('/ref_shop', 'ReferenceController@ref_shop')->name('ref_shop');
    Route::get('/shop-details', 'ReferenceController@details')->name('shop.details');
    Route::post('/payment-confirm', 'ReferenceController@pay_confirm')->name('payment.confirm');
    Route::get('/payment-report', 'ReferenceController@ref_pay_report')->name('payment.report');
    Route::get('/payment-print', 'ReferenceController@ref_pay_print')->name('payment.print');

});
//-------------------------- Manager ------------------------
Route::prefix('manager/')->name('manager.')->group(function () {
    Route::get('list', 'ReferenceController@manager')->name('index');
    Route::post('store', 'ReferenceController@manager_store')->name('store');
    Route::get('/edit', 'ReferenceController@manager_edit')->name('edit');
    Route::post('/update', 'ReferenceController@manager_update')->name('update');
    Route::get('/status', 'ReferenceController@manager_status')->name('status');

});

//------------------------ Ticket ----------------------
Route::prefix('ticket')->name('ticket.')->group(function () {
    Route::get('/index', 'TicketController@index')->name('index');
    Route::get('/add', 'TicketController@add')->name('add');
    Route::post('/store', 'TicketController@store')->name('store');
    Route::get('/edit', 'TicketController@edit')->name('edit');
    Route::post('/update', 'TicketController@update')->name('update');
    Route::get('/status', 'TicketController@status')->name('status');
    Route::get('/delete', 'TicketController@destroy')->name('destroy');
    Route::get('/search', 'TicketController@search')->name('search');
    Route::get('/details', 'TicketController@details')->name('details');
    Route::get('/info', 'TicketController@info')->name('info');
    Route::get('/report', 'TicketController@report')->name('report');
    Route::get('/report-print', 'TicketController@print')->name('report.print');
});

//-------------------------- Shop Package ------------------------
Route::prefix('shop-package')->name('shop.package.')->group(function () {
    Route::get('/list', 'ShopPackageController@index')->name('index');
    Route::post('/add', 'ShopPackageController@store')->name('store');
    Route::get('/edit', 'ShopPackageController@edit')->name('edit');
    Route::post('/update', 'ShopPackageController@update')->name('update');
    Route::get('/status', 'ShopPackageController@status')->name('status');
    Route::get('/delete', 'ShopPackageController@destroy')->name('destroy');
});

//-------------------------- Shop Payment ------------------------
Route::prefix('shop-payment')->name('shop.payment.')->group(function () {
    Route::get('/list', 'ShopPaymentController@index')->middleware('auth','inactiveShop')->name('index');
    Route::get('/index', 'ShopPaymentController@lindex')->middleware('auth','inactiveShop')->name('lindex');
    Route::post('/add', 'ShopPaymentController@store')->name('store');
    Route::get('/pkg', 'ShopPaymentController@shoppkg')->name('pkg');
    Route::get('/edit', 'ShopPaymentController@edit')->middleware('auth','inactiveShop')->name('edit');
    Route::post('/update', 'ShopPaymentController@update')->middleware('auth','inactiveShop')->name('update');
    Route::get('/status', 'ShopPaymentController@status')->middleware('auth','inactiveShop')->name('status');
    Route::get('/delete', 'ShopPaymentController@destroy')->middleware('auth','inactiveShop')->name('destroy');
});

//-------------------------- Employee ------------------------
Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/list', 'EmployeeController@index')->name('index');
    Route::post('/add', 'EmployeeController@store')->name('store');
    Route::get('/edit', 'EmployeeController@edit')->name('edit');
    Route::post('/update', 'EmployeeController@update')->name('update');
    Route::get('/status', 'EmployeeController@status')->name('status');
    Route::get('/delete', 'EmployeeController@destroy')->name('destroy');
    Route::get('/change-password', 'EmployeeController@change_password')->name('change.password');
    Route::post('/changePassword', 'EmployeeController@changePassword')->name('changePassword');
    Route::get('/logout', 'EmployeeController@logout')->name('logout');
});

//-------------------------- Supplier ------------------------
Route::prefix('supplier')->name('supplier.')->group(function () {
    Route::get('/list', 'SupplierController@index')->name('index');
    Route::post('/add', 'SupplierController@store')->name('store');
    Route::get('/edit', 'SupplierController@edit')->name('edit');
    Route::post('/update', 'SupplierController@update')->name('update');
    Route::get('/status', 'SupplierController@status')->name('status');
    Route::get('/delete', 'SupplierController@destroy')->name('destroy');
    Route::get('/details', 'PurchaseController@details')->name('details');
});

//-------------------------- Customer ------------------------
Route::prefix('customer')->name('customer.')->group(function () {
    Route::get('/list', 'CustomerController@index')->name('index');
    Route::post('/add', 'CustomerController@store')->name('store');
    Route::get('/edit', 'CustomerController@edit')->name('edit');
    Route::any('/update', 'CustomerController@update')->name('update');
    Route::get('/status', 'CustomerController@status')->name('status');
    Route::any('/delete/{id}', 'CustomerController@destroy')->name('destroy');
    Route::get('/details', 'SaleController@details')->name('details');
});

//-------------------------- Delivery Company ------------------------
Route::prefix('delivery')->name('delivery.')->group(function () {
    Route::get('/index', 'DeliveryController@index')->name('index');
    Route::post('/store', 'DeliveryController@store')->name('store');
    Route::get('/edit', 'DeliveryController@edit')->name('edit');
    Route::post('/update', 'DeliveryController@update')->name('update');
    Route::get('/status', 'DeliveryController@status')->name('status');
    Route::get('/destroy', 'DeliveryController@destroy')->name('destroy');
    Route::get('/details', 'SaleController@details')->name('details');
});

//-------------------------- Category ------------------------
Route::prefix('category')->name('category.')->group(function () {
    Route::get('/list', 'CategoryController@index')->name('index');
    Route::post('/add', 'CategoryController@store')->name('store');
    Route::get('/edit', 'CategoryController@edit')->name('edit');
    Route::post('/update', 'CategoryController@update')->name('update');
    Route::get('/status', 'CategoryController@status')->name('status');
    Route::any('/delete/{id}', 'CategoryController@destroy')->name('destroy');
});

//-------------------------- Medicine Type ------------------------
Route::prefix('medicine_type')->name('medicine_type.')->group(function () {
    Route::get('/list', 'MedicineTypesController@index')->name('index');
    Route::post('/add', 'MedicineTypesController@store')->name('store');
    Route::get('/edit', 'MedicineTypesController@edit')->name('edit');
    Route::post('/update', 'MedicineTypesController@update')->name('update');
    Route::get('/status', 'MedicineTypesController@status')->name('status');
    
});

//-------------------------- Medicine Shelf ------------------------
Route::prefix('medicine_shelf')->name('medicine_shelf.')->group(function () {
    Route::get('/list', 'MedicineShelfController@index')->name('index');
    Route::post('/add', 'MedicineShelfController@store')->name('store');
    Route::get('/edit', 'MedicineShelfController@edit')->name('edit');
    Route::post('/update', 'MedicineShelfController@update')->name('update');
    Route::get('/status', 'MedicineShelfController@status')->name('status');
    Route::delete('/delete/{id}', 'MedicineShelfController@destroy')->name('destroy');
});

//-------------------------- Medicine Unit ------------------------
Route::prefix('medicine_unit')->name('medicine_unit.')->group(function () {
    Route::get('/list', 'MedicineUnitController@index')->name('index');
    Route::post('/add', 'MedicineUnitController@store')->name('store');
    Route::get('/edit', 'MedicineUnitController@edit')->name('edit');
    Route::post('/update', 'MedicineUnitController@update')->name('update');
    Route::get('/status', 'MedicineUnitController@status')->name('status');
    Route::delete('/delete/{id}', 'MedicineUnitController@destroy')->name('destroy');
});

//-------------------------- Product ------------------------
Route::prefix('product')->name('product.')->group(function () {
    Route::get('/list', 'ProductController@index')->name('index');
    Route::get('/create', 'ProductController@create')->name('create');
    Route::get('/search','ProductController@search')->name('search');
    Route::post('/add', 'ProductController@store')->name('store');
    Route::get('/importView', 'ProductController@importView')->name('importView');
    Route::post('/import', 'ProductController@import')->name('import');
    Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
    Route::post('/update/{id}', 'ProductController@update')->name('update');
    Route::get('/status', 'ProductController@status')->name('status');
    Route::get('/delete', 'ProductController@destroy')->name('destroy');
});

//-------------------------- hourly entry ------------------------
Route::prefix('hourly_entry')->name('hourly_entry.')->group(function () {
    Route::get('/index', 'HourlyEntryController@index')->name('index');
    Route::get('/entry', 'HourlyEntryController@entry')->name('entry');
    Route::any('/getPrice', 'HourlyEntryController@getPrice')->name('getPrice');
    Route::post('/add', 'HourlyEntryController@store')->name('store');
    Route::get('/checkout', 'HourlyEntryController@checkout')->name('checkout');
});

//-------------------------- checkin ------------------------
Route::prefix('checkin')->name('checkin.')->group(function () {
    Route::get('/index', 'CheckinController@index')->name('index');
    Route::any('/entry', 'CheckinController@entry')->name('entry');
    Route::post('/getClient', 'CheckinController@getClient')->name('getClient');
    Route::any('/add', 'CheckinController@store')->name('checkin');
    Route::any('/clientRegister', 'CheckinController@clientRegister')->name('clientRegister');
    Route::get('/checkout', 'CheckinController@checkout')->name('checkout');
});

//-------------------------- monthly_entry ------------------------
Route::prefix('monthly_entry')->name('monthly_entry.')->group(function () {
    Route::get('/index', 'MonthlyEnrtyController@index')->name('index');
    Route::get('/entry', 'MonthlyEnrtyController@entry')->name('entry');
    Route::any('/getClient', 'MonthlyEnrtyController@getClient')->name('getClient');
    Route::any('/getPrice', 'MonthlyEnrtyController@getPrice')->name('getPrice');
    Route::post('/add', 'MonthlyEnrtyController@store')->name('store');
    Route::get('/payment_status', 'MonthlyEnrtyController@payment_status')->name('payment_status');
});

//-------------------------- Monthly Checkin ------------------------
Route::prefix('monthly_checkin')->name('monthly_checkin.')->group(function () {
    Route::get('/index', 'MonthlyCheckinController@index')->name('index');
    Route::get('/entry', 'MonthlyCheckinController@entry')->name('entry');
    Route::any('/getClient', 'MonthlyCheckinController@getClient')->name('getClient');
    Route::post('/add', 'MonthlyCheckinController@store')->name('store');
    Route::get('/checkout', 'MonthlyCheckinController@checkout')->name('checkout');
});

//-------------------------- Vehicle Category ------------------------
Route::prefix('vehicle_category')->name('vehicle_category.')->group(function () {
    Route::get('/list', 'VehicleCategoryController@index')->name('index');
    Route::get('/create', 'VehicleCategoryController@create')->name('create');
    Route::post('/add', 'VehicleCategoryController@store')->name('store');
    Route::get('/edit/{id}', 'VehicleCategoryController@edit')->name('edit');
    Route::post('/update/{id}', 'VehicleCategoryController@update')->name('update');
    Route::get('/status', 'VehicleCategoryController@status')->name('status');
    Route::get('/delete', 'VehicleCategoryController@destroy')->name('destroy');
});

//-------------------------- Parking Group ------------------------
Route::prefix('parking_group')->name('parking_group.')->group(function () {
    Route::get('/list', 'ParkingGroupsController@index')->name('index');
    Route::get('/create', 'ParkingGroupsController@create')->name('create');
    Route::post('/add', 'ParkingGroupsController@store')->name('store');
    Route::get('/edit/{id}', 'ParkingGroupsController@edit')->name('edit');
    Route::post('/update/{id}', 'ParkingGroupsController@update')->name('update');
    Route::get('/status', 'ParkingGroupsController@status')->name('status');
    Route::get('/delete', 'ParkingGroupsController@destroy')->name('destroy');
});

//-------------------------- ParkingPrice ------------------------
Route::prefix('parking_price')->name('parking_price.')->group(function () {
    Route::get('/list', 'ParkingPricesController@index')->name('index');
    Route::get('/create', 'ParkingPricesController@create')->name('create');
    Route::post('/add', 'ParkingPricesController@store')->name('store');
    Route::get('/edit/{id}', 'ParkingPricesController@edit')->name('edit');
    Route::post('/update/{id}', 'ParkingPricesController@update')->name('update');
    Route::get('/status', 'ParkingPricesController@status')->name('status');
    Route::get('/delete', 'ParkingPricesController@destroy')->name('destroy');
});

//-------------------------- Purchase ------------------------
Route::prefix('purchase')->name('purchase.')->group(function () {
    Route::get('/list', 'PurchaseController@index')->name('index');
    Route::any('/clientinfo', 'PurchaseController@clientinfo')->name('clientinfo');
    Route::any('/getTests', 'PurchaseController@getTests')->name('getTests');


    Route::get('/all-clear', 'PurchaseController@clean')->name('clean');
    Route::get('/all-remove', 'PurchaseController@remove')->name('remove');
    Route::post('/item-save', 'PurchaseController@item_save')->name('submit');
});
//Purchase Edit
Route::prefix('purchase-edit')->name('purchase.edit.')->group(function () {
    Route::get('/list', 'PurchaseEditController@index')->name('list');
    Route::get('/search', 'PurchaseEditController@search')->name('search');
    Route::get('/index', 'PurchaseEditController@new_index')->name('index');
    Route::get('/details', 'PurchaseEditController@details')->name('details');
    Route::post('/add-item', 'PurchaseEditController@add_item')->name('item');
    Route::post('/add-qty', 'PurchaseEditController@add_qty')->name('qty');
    Route::post('/add-price', 'PurchaseEditController@add_price')->name('price');
    Route::get('/all-clear', 'PurchaseEditController@clean')->name('clean');
    Route::get('/back', 'PurchaseEditController@back')->name('back');
    Route::get('/remove', 'PurchaseEditController@remove')->name('remove');
    Route::post('/confirm', 'PurchaseEditController@confirm')->name('confirm');
});
//Purchase Cancel
Route::prefix('purchase-cancel')->name('purchase.cancel.')->group(function () {
    Route::get('/index', 'PurchaseCancelController@index')->name('index');
    Route::get('/details', 'PurchaseCancelController@details')->name('details');
    Route::post('/confirm', 'PurchaseCancelController@confirm')->name('confirm');
});
//Bercode
Route::prefix('barcode')->name('barcode.')->group(function () {
    Route::get('/index', 'BarcodeController@index')->name('index');
    Route::get('/edit', 'BarcodeController@edit')->name('edit');
    Route::post('/update', 'BarcodeController@update')->name('update');
    Route::get('/remove', 'BarcodeController@remove')->name('remove');
    Route::get('/clean', 'BarcodeController@clean')->name('clean');
    Route::get('/generate', 'BarcodeController@generate')->name('generate');
});

//-------------------------- Stock ------------------------
Route::prefix('stock')->name('stock.')->group(function () {
    Route::get('/list', 'StockController@index')->name('index');
    Route::get('/minimum-report', 'StockController@minimum')->name('minimum');
    Route::get('/minimum-print', 'StockController@minimum_print')->name('minimum.print');
});

//-------------------------- Sale ------------------------
Route::prefix('sale')->name('sale.')->group(function () {
    Route::get('/list', 'SaleController@index')->name('index');
    Route::post('/add-item', 'SaleController@add_item')->name('item');
    Route::post('/add-qty', 'SaleController@add_qty')->name('qty');
    Route::post('/add-price', 'SaleController@add_price')->name('price');
    Route::get('/all-clear', 'SaleController@clean')->name('clean');
    Route::get('/all-remove', 'SaleController@remove')->name('remove');
    Route::post('/item-save', 'SaleController@item_save')->name('submit');
});
///Sale Cancel
Route::prefix('sale-cancel')->name('sale.cancel.')->group(function () {
    Route::get('/index', 'SaleCancelController@index')->name('index');
    Route::get('/details', 'SaleCancelController@details')->name('details');
    Route::post('/confirm', 'SaleCancelController@confirm')->name('confirm');
});

//-------------------------- Expense Type ------------------------
Route::prefix('expense-type')->name('expense.type.')->group(function () {
    Route::get('/index', 'ExpenseTypeController@index')->name('index');
    Route::post('/store', 'ExpenseTypeController@store')->name('store');
    Route::get('/edit', 'ExpenseTypeController@edit')->name('edit');
    Route::post('/update', 'ExpenseTypeController@update')->name('update');
    Route::get('/status', 'ExpenseTypeController@status')->name('status');
    Route::get('/delete', 'ExpenseTypeController@destroy')->name('destroy');
});

//-------------------------- Expense ------------------------
Route::prefix('expense')->name('expense.')->group(function () {
    Route::get('/index', 'ExpenseController@index')->name('index');
    Route::post('/store', 'ExpenseController@store')->name('store');
    Route::get('/edit', 'ExpenseController@edit')->name('edit');
    Route::post('/update', 'ExpenseController@update')->name('update');
    Route::get('/status', 'ExpenseController@status')->name('status');
    Route::get('/delete', 'ExpenseController@destroy')->name('destroy');
});

//-------------------------- Collection ------------------------
Route::prefix('collection')->name('collection.')->group(function () {
    Route::get('/index', 'CollectionController@index')->name('index');
    Route::post('/store', 'CollectionController@store')->name('store');
    Route::get('/edit', 'CollectionController@edit')->name('edit');
    Route::get('invoice/{id}', 'CollectionController@customer_invoice')->name('invoice');
    Route::get('/due', 'CollectionController@customer_due')->name('due');
    Route::get('/find', 'CollectionController@customer_find')->name('find');
    Route::post('/update', 'CollectionController@update')->name('update');
    Route::get('/status', 'CollectionController@status')->name('status');
    Route::get('/delete', 'CollectionController@destroy')->name('destroy');
});

//-------------------------- Payment ------------------------
Route::prefix('payment')->name('payment.')->group(function () {
    Route::get('/index', 'PaymentController@index')->name('index');
    Route::post('/store', 'PaymentController@store')->name('store');
    Route::get('/edit', 'PaymentController@edit')->name('edit');
    Route::post('/update', 'PaymentController@update')->name('update');
    Route::get('/status', 'PaymentController@status')->name('status');
    Route::get('/delete', 'PaymentController@destroy')->name('destroy');
});

//-------------------------- Report ------------------------
//Purchase
Route::prefix('purchase-report')->name('purchase.report.')->group(function () {
    Route::get('/datewise', 'Report\PurchaseController@datewise')->name('datewise');
    Route::get('/datewise-print', 'Report\PurchaseController@print_datewise')->name('print_datewise');
    Route::get('/details', 'Report\PurchaseController@details')->name('details');
    Route::get('/groupby', 'Report\PurchaseController@groupby_date')->name('groupby');
    Route::get('/groupby-print', 'Report\PurchaseController@print_groupby')->name('print_groupby');
    Route::get('/groupby-details', 'Report\PurchaseController@groupby_details')->name('groupby.details');
    Route::get('/groupby-details-print', 'Report\PurchaseController@groupby_print')->name('groupby_print');
    Route::get('/invoice', 'Report\PurchaseController@invoice')->name('invoice');
});
//Sale
Route::prefix('sale-report')->name('sale.report.')->group(function () {
    Route::get('/datewise', 'Report\SaleController@datewise')->name('datewise');
    Route::get('/datewise-print', 'Report\SaleController@print_datewise')->name('print.datewise');
    Route::get('/details', 'Report\SaleController@details')->name('details');
    Route::get('/invoice', 'Report\SaleController@saleInvoice')->name('saleInvoice');
    Route::get('/chalan', 'Report\SaleController@chalan')->name('chalan');
    Route::get('/delivery-system', 'Report\SaleController@delivery')->name('delivery');
    Route::get('/sale_no', 'Report\SaleController@sale_no')->name('sale_no');
    Route::get('/delivery-system-print', 'Report\SaleController@print_delivery')->name('print.delivery');
    Route::get('/groupby', 'Report\SaleController@groupby_date')->name('groupby');
    Route::get('/groupby-print', 'Report\SaleController@print_groupby_date')->name('print.groupby');
    Route::get('/groupby-details', 'Report\SaleController@groupby_details')->name('groupby.details');
    Route::get('/groupby-details-print', 'Report\SaleController@groupby_print')->name('print.groupby.details');
});
//Expense
Route::prefix('expense-report')->name('expense.report.')->group(function () {
    Route::get('/datewise', 'Report\ExpenseController@datewise')->name('datewise');
    Route::get('/datewise-print', 'Report\ExpenseController@print_datewise')->name('print_datewise');
});
//Profit & Loss
Route::prefix('profit-loss')->name('profit.loss.')->group(function () {
    Route::get('/report', 'Report\ExpenseController@profit_loss')->name('report');
    Route::get('/print', 'Report\ExpenseController@profit_loss_print')->name('print');
});
//Collection
Route::prefix('collection-report')->name('collection.report.')->group(function () {
    Route::get('/datewise', 'Report\CollectionController@datewise')->name('datewise');
    Route::get('/datewise-print', 'Report\CollectionController@print_datewise')->name('print_datewise');
    Route::get('/delivery-system', 'Report\CollectionController@delivery')->name('delivery');
    Route::get('/delivery-print', 'Report\CollectionController@print_delivery')->name('print_delivery');
});
//Ledger
Route::prefix('ledger-report')->name('ledger.report.')->group(function () {
    Route::get('/customer', 'Report\LedgerController@customer_ledger')->name('customer');
    Route::get('/customer-print', 'Report\LedgerController@customer_print')->name('customer.print');
    Route::get('/supplier', 'Report\LedgerController@supplier_ledger')->name('supplier');
    Route::get('/supplier-print', 'Report\LedgerController@supplier_print')->name('supplier.print');
});
//Shop
Route::prefix('shop-report')->name('shop.report.')->group(function () {
    Route::get('/area-wise', 'ShopController@area_wise')->name('area.wise');
    Route::get('/business-type-wise', 'ShopController@business_type')->name('business.type.wise');
    Route::get('/status-wise', 'ShopController@status_wise')->name('status.wise');
    Route::get('/status-wise-print', 'ShopController@status_wise_print')->name('status.wise.print');
    Route::get('/reference-wise', 'ShopController@reference_wise')->name('reference.wise');
    Route::get('/reference-wise-print', 'ShopController@reference_print')->name('reference.wise.print');
    Route::get('/payment-expiry', 'ShopController@payment_expiry')->name('payment.expiry');
    Route::get('/payment-expiry-print', 'ShopController@paymentExpiry')->name('payment.expiry.print');
    Route::get('/payment-expired', 'ShopController@payment_expired')->name('payment.expired');
    Route::get('/payment-expired-print', 'ShopController@paymentExpired')->name('payment.expired.print');
});
//Payment
Route::prefix('shop-payment')->name('shop.payment.')->group(function () {
    Route::get('/datewise', 'ShopController@datewise')->name('datewise');
    Route::get('/datewise-print', 'ShopController@datewise_print')->name('datewise.print');
    Route::get('/reference-wise', 'ShopController@reference_datewise')->name('reference.wise');
    Route::get('/reference-wise-print', 'ShopController@reference_datewise_print')->name('reference.wise.print');
    Route::get('/datewise-report', 'ShopController@datewise_report')->name('datewise.report');
    Route::get('/datewise-report', 'PaymentController@datewise_report')->name('datewise.report');
    Route::get('/datewise-print', 'PaymentController@datewise_print')->name('datewise.print');
});
//Due
Route::prefix('due')->name('due.')->group(function () {
    Route::get('/customer-report', 'Report\LedgerController@due_customer_report')->name('customer.report');
    Route::get('/customer-print', 'Report\LedgerController@due_customer_print')->name('customer.print');
    Route::get('/supplier-report', 'Report\LedgerController@due_supplier_report')->name('supplier.report');
    Route::get('/supplier-print', 'Report\LedgerController@due_supplier_print')->name('supplier.print');
});

// Patient Reference
Route::prefix('patient-reference')->name('patient_reference.')->group(function () {
    Route::get('/list', 'PatientReferenceController@index')->name('index');
    Route::post('/add', 'PatientReferenceController@store')->name('store');
    Route::get('/edit', 'PatientReferenceController@edit')->name('edit');
    Route::post('/update', 'PatientReferenceController@update')->name('update');
    Route::get('/status', 'PatientReferenceController@status')->name('status');
    Route::get('/delete/{id}', 'PatientReferenceController@destroy')->name('destroy');
});