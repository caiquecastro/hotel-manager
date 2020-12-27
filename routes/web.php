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

Route::get('/register', 'GuestsController@create');
Route::post('/register', 'GuestsController@store');
Route::get('/register/success', 'GuestsController@registerSuccess');

Route::get('/menu', 'PagesController@menu');

Route::resource('customers', 'CustomersController');

Route::resource('rooms', 'RoomsController');
Route::put('rooms/{id}/maintenance', 'RoomsController@putMaintenance');
Route::get('rooms/{id}/booking', 'RoomsController@getBooking');

Route::resource('features', 'FeaturesController');
Route::resource('types', 'TypesController');

Route::resource('products', 'ProductsController');
Route::resource('users', 'UsersController');

Route::resource('bookings', 'BookingsController');
Route::get('bookings/{id}/checkout', 'BookingsController@getCheckout');
Route::get('/calendar', 'CalendarController@index');

Route::get('inventory', 'StockController@index');
Route::post('inventory', 'StockController@store');
Route::get('inventory/create', 'StockController@create');
Route::get('inventory/{id}', 'StockController@getProductInfo');

Route::get('reports', 'ReportsController@index');

Route::resource('orders', 'OrdersController');
Route::get('order-items/create', 'OrderItemsController@create');
Route::post('orders/{order}/items', 'OrderItemsController@store');
Route::delete('order-items/{orderItem}', 'OrderItemsController@destroy');

Route::get('consumption', 'ConsumptionController@index');
Route::post('consumption', 'ConsumptionController@store');

Route::get('finance', 'FinancesController@index');

Auth::routes(['register' => false]);
