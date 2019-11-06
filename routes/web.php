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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('dishes', 'DishesController');
Route::resource('menu', 'MenuController');
Route::resource('reservations', 'ReservationsController');
Route::resource('orders', 'OrdersController');
Route::resource('tables', 'TablesController');
Route::resource('users', 'UsersController');

Route::get('/myAccount', 'UsersController@myAccount' );

Route::get('/user/createReservation', 'ReservationsController@userCreate' );
Route::get('/user/editReservation', 'ReservationsController@userEdit' );
Route::get('/user/listReservations', 'ReservationsController@userIndex' );