<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test',function(){
	return view('sellProduct.test');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vendor', 'VendorController@index')->name('vendor.view');
Route::post('/vendor/save', 'VendorController@insertVendor')->name('vendor.add');
Route::get('/vendor/{id}', 'VendorController@editVendor')->name('vendor.edit');
Route::post('/vendor/update/{id}', 'VendorController@updateVendor')->name('vendor.update');
Route::get('/product/category','ProductCategoryController@index')->name('product.category');
Route::post('/product/category/save','ProductCategoryController@insertCategory')->name('product.category.save');
Route::get('/product/category/edit/{id}','ProductCategoryController@editCategory')->name('product.category.edit');
Route::post('/product/category/update/{id}','ProductCategoryController@updateCategory')->name('product.category.update');
Route::get('/product','ProductController@index')->name('product.view');
Route::post('/product/save','ProductController@insertProduct')->name('product.save');

Route::post('/expenses','ProductController@insertProduct')->name('expenses');

Route::get('/stock','StockInController@index')->name('stock.view');
Route::get('/dependent/product','StockInController@fatch')->name('dynamicdependent.fetch');
Route::post('/stock/save','StockInController@insertStock')->name('stock.save');

Route::get('/invoice','InvoiceSellController@index')->name('invoice.view');

Route::get('/invoice/view/fatch','InvoiceSellController@index')->name('invoice.view.fatch');

Route::get('/invoice/fatch','InvoiceSellController@fatchChalan')->name('invoice.qty.get');
Route::get('/invoice/fatch/price','InvoiceSellController@fatchChalanPrice')->name('invoice.price.get');
Route::post('/invoice/insert','InvoiceSellController@invoiceStore')->name('invoice.qty.save');
Route::get('/invoice/print','InvoiceSellController@invoicePrint')->name('invoice.print');
// Route::post('/invoice/insert','InvoiceSellController@create_invoice')->name('invoice.qty.store');



