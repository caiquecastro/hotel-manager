<?php

use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConsumptionController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\FinancesController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\OrderItemsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;

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

Route::get('/register', [GuestsController::class, 'create']);
Route::post('/register', [GuestsController::class, 'store']);
Route::get('/register/success', [GuestsController::class, 'registerSuccess']);

Route::get('/cardapio', [PagesController::class, 'menu']);

Route::resource('customers', CustomersController::class);

Route::resource('rooms', RoomsController::class);
Route::put('rooms/{id}/maintenance', [RoomsController::class, 'putMaintenance']);
Route::get('rooms/{id}/booking', [RoomsController::class, 'getBooking']);

Route::resource('features', FeaturesController::class);
Route::resource('types', TypesController::class);

Route::resource('products', ProductsController::class);
Route::resource('users', UsersController::class);

Route::resource('bookings', BookingsController::class);
Route::get('bookings/{id}/checkout', [BookingsController::class, 'getCheckout']);
Route::get('/calendar', [CalendarController::class, 'index']);

Route::get('inventory', [StockController::class, 'index']);
Route::post('inventory', [StockController::class, 'store']);
Route::get('inventory/create', [StockController::class, 'create']);
Route::get('inventory/{id}', [StockController::class, 'getProductInfo']);

Route::get('reports', [ReportsController::class, 'index']);

Route::resource('orders', OrdersController::class);
Route::get('order-items/create', [OrderItemsController::class, 'create']);
Route::post('orders/{order}/items', [OrderItemsController::class, 'store']);
Route::delete('order-items/{orderItem}', [OrderItemsController::class, 'destroy']);

Route::get('consumption', [ConsumptionController::class, 'index']);
Route::post('consumption', [ConsumptionController::class, 'store']);

Route::get('finance', [FinancesController::class, 'index']);

Auth::routes(['register' => false]);
