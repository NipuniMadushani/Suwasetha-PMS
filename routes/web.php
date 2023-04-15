<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Front\FrontendController;

Route::get('/', function () {
    if (!empty(env('DB_DATABASE')) && !empty(env('DB_USERNAME'))) {
        if (!Auth::check()) {
            return view('auth.login');
        } else {
            return redirect()->route('dashboard');
        }
    } else {
        return redirect()->route('LaravelInstaller::welcome');
    }
});

Route::group(['domain' => '{username}.pharmacyss.com', 'middleware' => ['cartid']], function () {
    Route::get('/', 'HomeController@shop')->name('shop.index');
    Route::get('/cart', 'HomeController@cart')->name('shop.cart');
    Route::post('/place_order', 'HomeController@order')->name('shop.order');
    Route::get('/addcart/{id}', 'HomeController@addcart')->name('shop.addcart');
    Route::get('/delcart/{id}', 'HomeController@delcart')->name('shop.delcart');
    Route::get('/thank/{id}', 'HomeController@thank')->name('thank');
    Route::get('/contact.html', 'HomeController@contact')->name('home.contact');
    Route::any('login', 'HomeController@login')->name('signin');
});

Route::group(['middleware' => ['local']], function () {
    Route::get('/ecom', function () {
        return view('ecom');
    });
    Route::get('/terms', 'HomeController@terms')->name('terms');
    Route::any('/contact', 'HomeController@contacts')->name('contacts');
    Route::get('buy/{id?}', 'HomeController@buy')->name('buy');
    Route::post('place/order', 'HomeController@place_order')->name('place.order');
    Route::get('/local/{ln}', function ($ln) {
        session(['local' => $ln]);
        \Illuminate\Support\Facades\App::setLocale(session()->get('local'));

        return redirect()->back();
    })->name('language.change');

    Route::get('/logout', function () {
        Auth::logout();
        return Redirect::to('login');
    });
    Route::get('/demo/{username}', 'HomeController@demologin')->name('demologin');
    Route::get('get/district/{id?}', 'GeoController@get_district')->name('getDistrict');


    Route::get('get/upazilla/{id?}', 'GeoController@get_upazilla')->name('getUpazilla');

    Route::get('order/approved/{id}', 'HomeController@approve_order')->name('approved_order');

    Route::get('get/union/{id?}', 'GeoController@get_union')->name('getUnion');

    Route::get('get/pack/{id?}', 'GeoController@get_pack')->name('getPack');


    Auth::routes(['register' => true]);

    Route::group(['middleware' => ['auth', 'XSS']], function () {
        Route::get('userinfo/{id?}', 'PrescriptionController@userinfo')->name('userinfo');
        Route::any('/saas/upload_supplier', 'SaasController@supplier_upload')->name('supplier.upload');
        Route::post('sendbulksms', 'MessageController@sendssms')->name('sendbulksms');
        Route::get('sms/area/{city_id?}', 'MessageController@get_area')->name('sms.get_area');
        Route::get('sms/city/{state_id?}', 'MessageController@get_city')->name('sms.get_city');
        Route::get('bulksms', 'MessageController@bulksms')->name('bulksms');
        Route::get('message/{username?}', 'MessageController@message')->name('messageAdmin');
        Route::match(['get', 'post'], 'sms', 'MessageController@smsPanel')->name('smsPanel');
        Route::any('/saas/saas_management', 'SaasController@index')->name('saas.management');
        Route::any('/saas/saas_management/add', 'SaasController@add_shop')->name('saas.add');
        Route::any('/saas/saas_management/edit/{id}', 'SaasController@edit_shop')->name('saas.edit');
        Route::get('/saas/saas_management/delete/{id}', 'SaasController@delete_shop')->name('saas.delete');
        Route::get('/saas/package_management', 'SaasController@packages')->name('saas.package');
        Route::any('/saas/package_management/add', 'SaasController@add_packages')->name('saas.package.add');
        Route::any('/saas/package_management/edit/{id}', 'SaasController@edit_package')->name('saas.package.edit');
        Route::get('/saas/package_management/delete/{id}', 'SaasController@delete_package')->name('saas.package.delete');


        Route::get('/saas/coupon_management', 'SaasController@coupon')->name('saas.coupon');
        Route::any('/saas/coupon_management/add', 'SaasController@add_coupon')->name('saas.coupon.add');
        Route::any('/saas/coupon_management/edit/{id}', 'SaasController@edit_coupon')->name('saas.coupon.edit');
        Route::get('/saas/coupon_management/delete/{id}', 'SaasController@delete_coupon')->name('saas.coupon.delete');


        Route::get('/saas/invoice_management', 'SaasController@invoice')->name('saas.invoice');
        Route::get('/saas/invoice_management/approve/{id}', 'SaasController@invoice_appprove')->name('income.approve');
        Route::get('/saas/invoice_management/reject/{id}', 'SaasController@invoice_reject')->name('income.reject');
        Route::get('/saas/secretlogin/{id}', 'SaasController@secretlogin')->name('secret.login');
        Route::get('/supplier/medicine/{id?}', 'SupplierController@medicine')->name('supplier.medicine');
        Route::any('/saas/sms_single', 'SaasController@sms_single')->name('sms.single');
        Route::any('/saas/sms_all', 'SaasController@sms_all')->name('sms.all');


        Route::any('/saas/changes_request', 'SaasController@changes_request')->name('saas.changes.request');
        Route::any('/saas/changes/approve/{id}', 'SaasController@changes_approve')->name('saas.changes.approve');
        Route::any('/saas/changes/delete/{id}', 'SaasController@changes_delete')->name('saas.changes.delete');

        Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
        Route::any('/settings', 'DashboardController@settings')->name('settings');
        Route::any('/plan', 'PlanController@index')->name('plan');
        Route::any('/plan/renew', 'PlanController@renew')->name('renew.plan');
        Route::any('/plan/history', 'PlanController@history')->name('renew.history');




        Route::group(['middleware' => ['EXPIRE']], function () {
            Route::any('/updateprice/{id}', 'MedicineController@update_price')->name('update.price');
            Route::get('/stockout', 'MedicineController@stockout')->name('stockout');
            Route::get('/expired', 'MedicineController@expired')->name('expired');
            Route::get('/expired/delete/{id}', 'MedicineController@expired_delete')->name('expired.delete');
            Route::get('/in_stock', 'MedicineController@instock')->name('instock');
            Route::get('/emergency-stock', 'MedicineController@emergencyStock')->name('emergency_stock');
            Route::get('/upcoming', 'MedicineController@upcoming')->name('upcoming');
            Route::get('/returned_history', 'InvoiceController@return_history')->name('return.history');
            Route::any('/returned/{id}', 'InvoiceController@returned')->name('returned');
            Route::get('/purchase/purchase_returned_history', 'PurchaseController@return_history')->name('purchase.return.history');
            Route::any('/purchase/returned/{id}', 'PurchaseController@returned')->name('purchase.returned');
            Route::any('/purchase/returned/invoice/{id}', 'PurchaseController@purchase_return_invoice')->name('purchase.return_invoice');
            Route::any('/returned/{id}', 'InvoiceController@returned')->name('returned');
            Route::any('/profile_setting', 'ProfileController@setting')->name('profile.setting');
            Route::any('/profile_info_setting', 'ProfileController@info_setting')->name('profile.info.setting');
            Route::any('/customer/list', 'CustomerController@index')->name('customer.list');
            Route::any('/customer/add', 'CustomerController@add')->name('customer.add');
            Route::get('/customer/view/{id}', 'CustomerController@view')->name('customer.view');
            Route::any('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
            Route::get('/customer/delete/{id}', 'CustomerController@delete')->name('customer.delete');
            Route::get('/customer/reports', 'CustomerController@reports')->name('customer.reports');
            Route::get('/customer/due', 'CustomerController@due')->name('customer.due');

            //Report Routes
            Route::prefix('report')->name('report.')->group(function () {
                Route::get('customer/due', 'ReportController@customerDue')->name('customer_due');
                Route::get('supplier/due', 'ReportController@supplierDue')->name('supplier_due');
                Route::get('medicine/topsell', 'ReportController@topSellMedicine')->name('topsell_medicine');
            });

            Route::prefix('admin')->group(function () {
                Route::resource('admin',   'AdminController');
                Route::resource('role',    'RoleController');
                Route::get('role/delete/{id}',    'RoleController@delete')->name('role.delete');
            });


            Route::get('/ecommerce/view', 'InvoiceController@ecommerce')->name('ecommerce');
            Route::get('/supplier/list', 'SupplierController@index')->name('supplier.list');
            Route::any('/supplier/add', 'SupplierController@add')->name('supplier.add');
            Route::get('/supplier/view/{id}', 'SupplierController@view')->name('supplier.view');
            Route::any('/supplier/edit/{id}', 'SupplierController@edit')->name('supplier.edit');
            Route::get('/supplier/delete/{id}', 'SupplierController@delete')->name('supplier.delete');
            Route::get('/supplier/reports', 'SupplierController@reports')->name('supplier.reports');
            Route::get('/supplier/due', 'SupplierController@due')->name('supplier.due');

            Route::get('vendor/list', 'VendorController@index')->name('vendor.index');
            Route::post('vendor/store', 'VendorController@store')->name('vendor.store');
            Route::get('vendor/create', 'VendorController@create')->name('vendor.create');
            Route::put('vendor/{vendor}', 'VendorController@update')->name('vendor.update');
            Route::get('vendor/{vendor}', 'VendorController@show')->name('vendor.show');
            Route::delete('vendor/{vendor}', 'VendorController@destroy')->name('vendor.destroy');
            Route::get('vendor/{vendor}/edit', 'VendorController@edit')->name('vendor.edit');

            Route::get('/doctor/list', 'DoctorController@index')->name('doctor.list');
            Route::any('/doctor/add', 'DoctorController@add')->name('doctor.add');
            Route::get('/doctor/view/{id}', 'DoctorController@view')->name('doctor.view');
            Route::any('/doctor/edit/{id}', 'DoctorController@edit')->name('doctor.edit');
            Route::get('/doctor/delete/{id}', 'DoctorController@delete')->name('doctor.delete');
            Route::get('/doctor/reports', 'DoctorController@reports')->name('doctor.reports');
            Route::get('/doctor/due', 'DoctorController@due')->name('doctor.due');


            Route::get('/tests/list', 'TestController@index')->name('test.list');
            Route::any('/tests/add', 'TestController@add')->name('test.add');
            Route::get('/tests/delete/{id}', 'TestController@delete')->name('test.delete');

            Route::any('/prescrive/pop', 'PrescriptionController@pop')->name('prescrive.pop');
            Route::get('/prescrive/list', 'PrescriptionController@index')->name('prescrive.list');
            Route::any('/prescrive/add', 'PrescriptionController@add')->name('prescrive.add');
            Route::get('/prescrive/delete/{id}', 'PrescriptionController@delete')->name('prescrive.delete');
            Route::get('/prescrive/view/{id}', 'PrescriptionController@view')->name('prescrive.view');
            Route::get('/prescrive/data/{id}', 'PrescriptionController@data')->name('prescrive.data');

            Route::any('/tests/edit/{id}', 'TestController@edit')->name('test.edit');

            Route::get('/medicines/list', 'MedicineController@index')->name('medicine.list');
            Route::any('/medicines/edit/{id}', 'MedicineController@edit')->name('medicine.edit');
            Route::any('/medicines/change/{id}', 'MedicineController@change')->name('medicine.change');
            Route::any('/medicines/delete/{id}', 'MedicineController@delete')->name('medicine.delete');
            Route::any('/medicines/view/{id}', 'MedicineController@view')->name('medicine.view');
            Route::any('/medicines/add', 'MedicineController@add')->name('medicine.add');
            Route::get('/medicines/stockout', 'MedicineController@stockout')->name('stockout');
            Route::get('/medicines/expired', 'MedicineController@expired')->name('expired');
            Route::get('/medicines/leaf', 'LeafController@leaf')->name('leaf');
            Route::get('/medicines/unit', 'UnitController@unit')->name('units');
            Route::any('/medicines/unit/add', 'UnitController@add')->name('unit.add');
            Route::any('/medicines/unit/edit/{id}', 'UnitController@edit')->name('unit.edit');
            Route::get('/medicines/unit/delete/{id}', 'UnitController@delete')->name('unit.delete');



            Route::get('/medicines/type', 'TypeController@type')->name('types');
            Route::any('/medicines/type/add', 'TypeController@add')->name('type.add');
            Route::any('/medicines/type/edit/{id}', 'TypeController@edit')->name('type.edit');
            Route::any('/medicines/type/delete/{id}', 'TypeController@delete')->name('type.delete');

            Route::group(['prefix' => 'accounts', 'as' => 'accounting.'], function () {
                Route::get('/charts/list', 'AccountingController@chartlist')->name('charts.list');
            });

            Route::any('/medicines/leaf/add', 'LeafController@add')->name('leaf.add');
            Route::any('/medicines/leaf/edit/{id}', 'LeafController@edit')->name('leaf.edit');
            Route::any('/medicines/leaf/delete/{id}', 'LeafController@delete')->name('leaf.delete');

            Route::get('/medicines/categories', 'CategoryController@categories')->name('category');
            Route::any('/medicines/categories/edit/{id}', 'CategoryController@edit')->name('category.edit');
            Route::any('/medicines/categories/delete/{id}', 'CategoryController@delete')->name('category.delete');
            Route::any('/medicines/categories/view/{id}', 'CategoryController@view')->name('category.view');
            Route::any('/medicines/categories/add', 'CategoryController@add')->name('category.add');

            Route::any('/purchase/reports', 'PurchaseController@reports')->name('purchase.reports');
            Route::any('/purchase/new/{id?}', 'PurchaseController@new')->name('purchase.new');

            Route::any('/purchase/view/{id}', 'PurchaseController@view')->name('purchase.view');
            Route::any('/cart/remove/{id}', 'InvoiceController@recart')->name('rcart');

            Route::any('/purchase/delete/{id?}', 'PurchaseController@delete')->name('purchase.delete');
            Route::any('/purchase/inv/add/{id?}', 'PurchaseController@addtrx')->name('purchase.trx');
            Route::any('/invoice/inv/add/{id?}', 'InvoiceController@addtrx')->name('invoice.trx');
            Route::any('/invoice/reports', 'InvoiceController@reports')->name('invoice.reports');
            Route::any('/invoice/new', 'InvoiceController@new')->name('invoice.new');
            Route::get('/invoice/view/{id}', 'InvoiceController@view')->name('invoice.view');
            Route::get('/invoice/return/view/{id}', 'InvoiceController@return_invoce_view')->name('invoice.return_invoice.view');
            Route::get('/invoice/print/{id}', 'InvoiceController@print')->name('invoice.print');
            Route::get('/invoice/return-invoice/print/{id}', 'InvoiceController@returnInvoicePrint')->name('invoice.return_invoice.print');
            Route::get('/invoice/pdf/{id}', 'InvoiceController@pdf')->name('invoice.pdf');
            Route::get('/invoice/delete/{id}', 'InvoiceController@delete')->name('invoice.delete');
            Route::any('/reports', 'InvoiceController@allreports')->name('reports');
            Route::any('/profit', 'InvoiceController@profit')->name('profit');
            Route::any('/payment_methdod', 'PaymentController@method')->name('payment.method');
            Route::any('/payment_methdod/add', 'PaymentController@add')->name('payment.add');
            Route::any('/payment_methdod/delete/{id}', 'PaymentController@delete')->name('payment.delete');
            Route::any('/settings', 'DashboardController@settings')->name('settings');
            Route::any('/cart_add/{id}/{shop}', 'InvoiceController@cart')->name('invoice.cart');
            Route::any('/cart_checkout', 'InvoiceController@checkout')->name('continue.cart');
            Route::any('/invoice/approve/{id}', 'InvoiceController@approve')->name('invoice.approve');


            //pos management
            Route::group(['prefix' => 'purchase', 'as' => 'sell.'], function () {
                Route::get('/', 'SellController@index')->name('index');
                Route::get('quick-view', 'SellController@quick_view')->name('quick-view');
                Route::post('variant_price', 'SellController@variant_price')->name('variant_price');
                Route::post('add-to-cart', 'SellController@addToCart')->name('add-to-cart');
                Route::post('remove-from-cart', 'SellController@removeFromCart')->name('remove-from-cart');
                Route::post('cart-items', 'SellController@cart_items')->name('cart_items');
                Route::post('update-quantity', 'SellController@updateQuantity')->name('updateQuantity');
                Route::post('empty-cart', 'SellController@emptyCart')->name('emptyCart');
                Route::post('tax', 'SellController@update_tax')->name('tax');
                Route::post('discount', 'SellController@update_discount')->name('discount');
                Route::get('customers', 'SellController@get_customers')->name('customers');
                Route::post('order', 'SellController@place_order')->name('order');
                Route::get('orders', 'SellController@order_list')->name('orders');
                Route::get('order-details/{id}', 'SellController@order_details')->name('order-details');
                // Route::get('invoice/{id}', 'SellController@generate_invoice');
                Route::get('invoice/{id}', 'SellController@generate_invoice_order')->name('order.invoice');
                Route::any('store-keys', 'SellController@store_keys')->name('store-keys');
                Route::get('search-products', 'SellController@search_product')->name('search-products');


                Route::post('coupon-discount', 'SellController@coupon_discount')->name('coupon-discount');
                Route::get('change-cart', 'SellController@change_cart')->name('change-cart');
                Route::get('new-cart-id', 'SellController@new_cart_id')->name('new-cart-id');
                Route::post('remove-discount', 'SellController@remove_discount')->name('remove-discount');
                Route::get('clear-cart-ids', 'SellController@clear_cart_ids')->name('clear-cart-ids');
                Route::get('get-cart-ids', 'SellController@get_cart_ids')->name('get-cart-ids');

                Route::post('customer-store', 'SellController@customer_store')->name('customer-store');
            });


            //pos management
            Route::group(['prefix' => 'pos', 'as' => 'pos.'], function () {
                Route::get('/', 'POSController@index')->name('index');
                Route::get('quick-view', 'POSController@quick_view')->name('quick-view');
                Route::get('emrg-quick-view', 'POSController@emrg_quick_view')->name('emrg-quick-view');
                Route::post('variant_price', 'POSController@variant_price')->name('variant_price');
                Route::post('add-to-cart', 'POSController@addToCart')->name('add-to-cart');
                Route::post('add-to-batch', 'POSController@addToBatch')->name('add-to-batch');
                Route::post('remove-from-cart', 'POSController@removeFromCart')->name('remove-from-cart');
                Route::post('cart-items', 'POSController@cart_items')->name('cart_items');

                Route::post('quantity/increment', 'POSController@quantityIncrement')->name('quantity-increment');
                Route::post('quantity/decrement', 'POSController@quantityDecrement')->name('quantity-decrement');
                Route::post('set-batch', 'POSController@setBatch')->name('set-batch');
                Route::post('set-product-discount', 'POSController@setProductDiscount')->name('set-product-discount');

                Route::post('update-quantity', 'POSController@updateQuantity')->name('updateQuantity');
                Route::post('empty-cart', 'POSController@emptyCart')->name('emptyCart');
                Route::post('tax', 'POSController@update_tax')->name('tax');
                Route::post('discount', 'POSController@update_discount')->name('discount');
                Route::get('customers', 'POSController@get_customers')->name('customers');
                Route::post('order', 'POSController@place_order')->name('order');
                Route::get('orders', 'POSController@order_list')->name('orders');
                Route::get('order-details/{id}', 'POSController@order_details')->name('order-details');
                Route::get('invoice/{id}', 'POSController@generate_invoice');
                Route::any('store-keys', 'POSController@store_keys')->name('store-keys');
                Route::get('search-products', 'POSController@search_product')->name('search-products');


                Route::post('coupon-discount', 'POSController@coupon_discount')->name('coupon-discount');
                Route::get('change-cart', 'POSController@change_cart')->name('change-cart');
                Route::get('new-cart-id', 'POSController@new_cart_id')->name('new-cart-id');
                Route::post('remove-discount', 'POSController@remove_discount')->name('remove-discount');
                Route::get('clear-cart-ids', 'POSController@clear_cart_ids')->name('clear-cart-ids');
                Route::get('get-cart-ids', 'POSController@get_cart_ids')->name('get-cart-ids');

                Route::post('customer-store', 'POSController@customer_store')->name('customer-store');
            });
        });
    });
});

// CACHE CLEAR
Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return response()->json("Cache Cleared Successfully!");
});