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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/menu', 'DishController@menu')->name('menu');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/order/online', 'OrderController@createOrder')->name('order.create.online');
Route::get('/order-show/{orderToken}', 'OrderController@show')->name('order.show');
Route::get('/', 'HomeController@index')->name('home');


Auth::routes();
Route::middleware('auth','jwt.auth')->group(function () {
    Route::get('/table-admin', 'TableController@index')->name('table.index')->middleware('permission:tableIndex');
    Route::get('/table/edit/{id}', 'TableController@edit')->name('table.edit')->middleware('permission:tableEdit');
    Route::get('/table/{id}', 'TableController@show')->name('table.show')->middleware('permission:tableShow');
    Route::get('/table-waiter/{id}', 'TableController@showWaiter')->name('table.showWaiter')->middleware('permission:tableShow');
    Route::get('/dish', 'DishController@index')->name('dish.index')->middleware('permission:dishIndex');
    Route::get('/menu-admin', 'DishController@adminMenu')->name('menu.admin');
    Route::get('/dish/edit/{id}', 'DishController@edit')->name('dish.edit')->middleware('permission:dishEdit');
    Route::get('/dishCategory', 'DishCategoryController@index')->name('dishCategory.index')->middleware('permission:dishCategoryIndex');
    Route::get('/reservation/create', 'ReservationController@create')->name('reservation.create');
    Route::get('/reservation/user-index', 'ReservationController@indexUser')->name('reservation.indexUser')->middleware('permission:onlineReservationIndex');
    Route::get('/reservation/create-user', 'ReservationController@createUser')->name('reservation.createUser')->middleware('permission:reservationCreate|onlineReservationCreate');;
    Route::get('/reservation/index', 'ReservationController@index')->name('reservation.index');
    Route::get('/reservation/user-show/{id}', 'ReservationController@showUser')->name('reservation.showUser')
        ->middleware('permission:onlineReservationShow','myReservation');
    Route::get('/reservation/show/{id}', 'ReservationController@showWaiter')->name('reservation.showWaiter')
        ->middleware('permission:reservationShow');
    Route::get('/menu-admin', 'DishController@adminMenu')->name('menu.admin')->middleware('permission:tableIndex');
    Route::get('/dish/edit/{id}', 'DishController@edit')->name('dish.edit')->middleware('permission:dishEdit');
    Route::get('/dish/create', 'DishController@create')->name('dish.create')->middleware('permission:dishCreate');
    Route::get('/myAccount', 'UserController@myAccount')->name('user.myAccount');
    Route::get('/order/myOrders', 'CustomerMyOrdersController@index')->name('orders.myOrders');

    Route::name('worker.')->prefix('worker')->group(function () {
        Route::get('/create', 'WorkerController@create')->name('create')->middleware('permission:userCreate');
        Route::get('edit/{id}', 'WorkerController@edit')->name('edit')->middleware('permission:userEdit');
        Route::get('index', 'WorkerController@index')->name('index')->middleware('permission:userIndex');
    });
    Route::get('/orders/waiter-index', 'OrderController@index')->name('order.index');
    Route::get('/orders/waiter-create/{tableId}', 'OrderController@createWaiterOrder')->name('order.createWaiter');
    Route::get('/orders/waiter-edit/{orderToken}', 'OrderController@editWaiter')->name('order.editWaiter');
    
    Route::get('/tables/waiter-index', 'TableController@waiterIndex')->name('table.waiterIndex')->middleware('permission:tableIndex');

    Route::get('/vouchers/generate', 'VoucherController@add')->name('voucher.add')->middleware('permission:createVoucher');
    Route::get('/vouchers/customerVouchers', 'VoucherController@listCustomerVouchers')->name('user.myVouchers')->middleware('permission:showVoucher');
    Route::get('/my-statistics/worker', 'StatisticsController@listWorker')->name('myStatistics.asWorker')->middleware('permission:workerStatisticsShow');
    Route::get('/admin/allStatistics', 'StatisticsController@allStatistics')->name('admin.allStatistics')->middleware('permission:statisticsShow');
    Route::get('/admin/workersStatistics', 'StatisticsController@listAllWorkers')->name('admin.workersStatistics')->middleware('permission:statisticsShow');
    Route::get('/admin/statistics', 'StatisticsController@mainStatistics')->name('admin.statistics')->middleware('permission:statisticsShow');
    Route::get('/admin/workerStatistics/{year}/{id}', 'StatisticsController@workerStatistics')->name('admin.workerStatistics')->middleware('permission:statisticsShow');
});
