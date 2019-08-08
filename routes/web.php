<?php
use Illuminate\Http\Resources\Json\Resource;


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

Route::get('/', 'PagesController@index');

Route::get('/orders', 'OrdersController@index');
Route::get('/orders/create', 'OrdersController@create');
Route::get('/orders/{order}', 'OrdersController@show');
Route::post('/orders/buy', 'OrdersController@buy');
Route::get('/orders/pay/{order}', 'OrdersController@pay');
Route::patch('/orders/{order}', 'OrdersController@update');
Route::patch('/orders/{order}/status', 'OrdersController@changeStatus');

/* Route::resource('orders', 'OrdersController'); */
