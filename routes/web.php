<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::redirect('/', 'bookings');

Route::resource('customers', 'CustomersController');

Route::resource('rooms', 'RoomsController');
Route::put('rooms/{id}/maintenance', 'RoomsController@putMaintenance');
Route::get('rooms/{id}/booking', 'RoomsController@getBooking');

Route::resource('features', 'FeaturesController');
Route::resource('types', 'TypesController');

Route::resource('products', 'ProductsController');

Route::resource('bookings', 'BookingsController');
Route::get('bookings/{id}/checkout', 'BookingsController@getCheckout');

Route::get('stock', 'StockController@index');
Route::post('stock', 'StockController@store');
Route::get('stock/create', 'StockController@create');
Route::get('stock/{id}', 'StockController@getProductInfo');

Route::get('reports', 'ReportsController@index');

Route::get('consumption', 'ConsumptionController@index');
Route::post('consumption', 'ConsumptionController@store');

Route::get('finance', 'FinancesController@index');

Auth::routes();
