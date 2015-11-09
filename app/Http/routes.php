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

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('customers', 'CustomersController');

Route::resource('rooms', 'RoomsController');
Route::put('rooms/{id}/maintenance', 'RoomsController@putMaintenance');

Route::resource('features', 'FeaturesController');
Route::resource('types', 'TypesController');

Route::resource('products', 'ProductsController');

Route::resource('bookings', 'BookingsController');
Route::get('bookings/create/{id}', 'BookingsController@create');
Route::get('bookings/{id}/checkout', 'BookingsController@getCheckout');

Route::get('stock', 'StockController@index');

Route::get('reports', 'ReportsController@index');

