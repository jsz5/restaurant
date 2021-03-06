<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authenticate', 'API\ApiAuthenticateController@authenticate');
Route::post('/logout', 'API\ApiAuthenticateController@logout');
Route::post('/user/store-customer', 'API\ApiUserController@storeCustomer')->name('storeCustomer');
Route::post('/order/online/update', 'API\ApiOrderController@updateOnlineOrder')->name('api.order.updateOnlineOrder');
Route::post('/order/online', 'API\ApiOrderController@storeNewOrderOnline')->name('api.order.storeNewOrderOnline');
Route::get('/order/show/{orderToken}', 'API\ApiOrderController@loadOrder')->name('api.order.loadOrder');
Route::get('/user/auth-user', 'API\ApiUserController@myAccount')->name('api.user.authenticatedUser');
Route::delete('/order/delete/{orderToken}', 'API\ApiOrderController@deleteOrder')->name('api.order.delete');
Route::post('/contact', 'API\ApiContactController@addFeedback')->name('api.contact.addFeedback');

Route::name('api.')->namespace('API')->middleware(['jwt.auth'])->group(function () {
    //todo refactor na group
//table
    Route::get('/table', 'ApiTableController@index')->name('table.index')
        ->middleware('permission:tableIndex');
    Route::get('/table/{table}', 'ApiTableController@load')->name('table.load')
        ->middleware('permission:tableIndex');
    Route::get('/table/waiter/{table}', 'ApiTableController@loadTableForWaiter')->name('table.loadTableForWaiter')
        ->middleware('permission:tableShow');
    Route::post('/table', 'ApiTableController@store')->name('table.store')
        ->middleware('permission:tableCreate');
    Route::post('/table/update', 'ApiTableController@update')->name('table.update')
        ->middleware('permission:tableEdit');
    Route::delete('/table/{table}', 'ApiTableController@delete')->name('table.delete')
        ->middleware('permission:tableDelete');
    Route::get('/my-tables', 'ApiTableController@myTables')->name('table.myTables')
        ->middleware('permission:tableIndex');
    Route::post('/table/{table}/open', 'ApiTableController@openTable')->name('table.openTable')
        ->middleware('permission:orderEdit');
    Route::post('/table/{table}/close', 'ApiTableController@closeTable')->name('table.closeTable')
        ->middleware('permission:orderEdit');
//dish
    Route::get('/dish', 'ApiDishController@index')->name('dish.index')
        ->middleware('permission:dishIndex');
    Route::get('/dish/{dish}', 'ApiDishController@load')->name('dish.load')
        ->middleware('permission:dishShow');
    Route::post('/dish', 'ApiDishController@store')->name('dish.store')
        ->middleware('permission:dishCreate');
    Route::post('/dish/photo', 'ApiDishPhotoController@store')->name('dish.photoAdd')
        ->middleware('permission:dishCreate');
    Route::delete('/dish/photo/{id}', 'ApiDishPhotoController@destroy')->name('dish.photoDelete')
        ->middleware('permission:dishCreate');
    Route::post('/dish/update', 'ApiDishController@update')->name('dish.update')
        ->middleware('permission:dishEdit');
    Route::delete('/dish/{dish}', 'ApiDishController@delete')->name('dish.delete')
        ->middleware('permission:dishDelete');
    Route::post('/dish/remove-photo', 'ApiDishController@removePhoto')->name('dish.removePhoto')
        ->middleware('permission:dishEdit');
//dishCategory
    Route::get('/dishCategory', 'ApiDishCategoryController@index')->name('dishCategory.index')
        ->middleware('permission:dishCategoryIndex');
    Route::post('/dishCategory', 'ApiDishCategoryController@store')->name('dishCategory.store')
        ->middleware('permission:dishCategoryCreate');
    Route::post('/dishCategory/update', 'ApiDishCategoryController@update')->name('dishCategory.update')
        ->middleware('permission:dishCategoryEdit');
    Route::delete('/dishCategory/{dishCategory}', 'ApiDishCategoryController@delete')->name('dishCategory.delete')
        ->middleware('permission:dishCategoryDelete');

//favouriteDish
    Route::get('/myFavourite', 'ApiFavouriteDishController@myFavourite')->name('favouriteDishId.index')
        ->middleware('permission:showVoucher');
    Route::get('/favouriteDish', 'ApiFavouriteDishController@onlyFavourite')->name('favouriteDish.index')
        ->middleware('permission:showVoucher');
    Route::post('/favouriteDish/create', 'ApiFavouriteDishController@addFavourite')->name('favouriteDish.store')
        ->middleware('permission:showVoucher');
    Route::post('/favouriteDish/delete', 'ApiFavouriteDishController@deleteFavourite')->name('favouriteDish.delete')
        ->middleware('permission:showVoucher');

//order
    Route::post('/order/status', 'ApiOrderController@changeStatusOrder')->name('order.changeStatusOrder')
        ->middleware('permission:orderEdit');
    Route::get('/order/status-types', 'ApiOrderController@fetchOrderStatusTypes')->name('order.fetchOrderStatusTypes')
        ->middleware('permission:orderIndex');
    Route::get('/order/my-order', 'ApiOrderController@myOrder')->name('order.myOrder')
        ->middleware('permission:userOrderIndex');
    Route::get('/order/customer-index', 'ApiOrderController@customerOrder')->name('order.customerOrder')
        ->middleware('permission:userOrderIndex');
    Route::get('/order/{type}', 'ApiOrderController@orderWithStatus')->name('order.orderWithStatus')
        ->middleware('permission:orderIndex');
    Route::post('/order/worker', 'ApiOrderController@storeNewOrderFromWorker')->name('order.storeNewOrderFromWorker')
        ->middleware('permission:orderCreate');


    Route::post('/order/worker/update', 'ApiOrderController@updateOrderFromWorker')->name('order.updateOrderFromWorker')
        ->middleware('permission:orderEdit');


    Route::post('/voucher/create', 'ApiVoucherController@createVouchers')->name('voucher.create')
        ->middleware('permission:createVoucher');
    Route::post('/voucher/use', 'ApiVoucherController@addVoucherToOrder')->name('voucher.use')
        ->middleware('permission:orderCreate');


    Route::name('reservation.')->prefix('reservation')->group(function () {
        Route::post('/store-as-customer', 'ApiReservationController@storeAsCustomer')->name('storeAsCustomer')->middleware('permission:onlineReservationCreate');
        Route::post('/store-as-worker', 'ApiReservationController@storeAsWorker')->name('storeAsWorker')->middleware('permission:reservationCreate');
        Route::put('/update-as-worker', 'ApiReservationController@updateAsWorker')->name('updateAsWorker')->middleware('permission:reservationEdit');
        Route::get('/show/{id}', 'ApiReservationController@fetchReservation')->name('show')->middleware('permission:reservationShow|onlineReservationShow');
        Route::get('/show-user/{id}', 'ApiReservationController@fetchReservation')->name('showUser')->middleware('permission:reservationShow|onlineReservationShow','myReservation');
        Route::get('/customer-index', 'ApiReservationController@customerIndex')->name('customerIndex')->middleware('permission:onlineReservationIndex');
        Route::get('/worker-index/{date}', 'ApiReservationController@workerIndex')->name('workerIndex')->middleware('permission:reservationIndex');
        Route::get('/tables/{date}', 'ApiReservationController@fetchTablesByDate')->name('fetchTablesByDate')->middleware('permission:reservationIndex');
        Route::delete('/{id}', 'ApiReservationController@delete')->name('delete')->middleware('permission:reservationDelete|onlineReservationDelete');
    });

    Route::name('order.')->prefix('order')->group(function () {
        Route::get('/tables/{date}', 'ApiOrderController@fetchTablesByDate')->name('fetchTablesByDate')->middleware('permission:orderIndex');
    });


    Route::name('user.')->prefix('user')->group(function () {
        Route::get('/fetch-user/{user}', 'ApiUserController@fetchUser')->name('fetchUser')->middleware('permission:userEdit');
        Route::get('/fetch-customers', 'ApiUserController@fetchCustomers')->name('fetchCustomers')->middleware('permission:customerIndex');
        Route::get('/fetch-workers', 'ApiUserController@fetchWorkers')->name('fetchWorkers')->middleware('permission:userIndex');
        Route::get('/fetch-user-my-account/{user}', 'ApiUserController@fetchUser')->name('fetchUserMyAccount')
            ->middleware('myAccount');
        Route::put('/change-password/{user}', 'ApiUserController@changePassword')->name('changePassword')->middleware
        ('permission:userEdit');
        Route::put('/change-password-my-account/{user}', 'ApiUserController@changePassword')->name('changePasswordMyAccount')->middleware('myAccount');
        Route::put('/update-my-account/{user}', 'ApiUserController@update')->name('updateUserMyAccount')->middleware('myAccount');
        Route::put('/update-worker/{user}', 'ApiUserController@update')->name('updateWorker')->middleware('permission:userEdit');
        Route::put('/update-customer/{user}', 'ApiUserController@update')->name('updateCustomer')->middleware('permission:customerEdit');
        Route::post('/store-worker', 'ApiUserController@storeWorker')->name('storeWorker')->middleware('permission:createUser');
        Route::delete('/{id}', 'ApiUserController@destroy')->name('delete')->middleware('permission:userDelete');
        Route::get('/vouchers', 'ApiVoucherController@myVoucher')->name('getMyVoucher')->middleware('permission:showVoucher');
    });

    Route::name('statistics.')->prefix('statistics')->group(function () {
        Route::get('/year/{year}', 'ApiStatisticsController@yearStatisticsIndex')->name('yearIndex')->middleware('permission:statisticsShow');
        Route::get('/waiter/{year}/{id}', 'ApiStatisticsController@waiterStatisticsIndex')->name('waiterIndex')->middleware('permission:statisticsShow');
        Route::get('/waiter/{year}', 'ApiStatisticsController@waiterMyStatisticsIndex')->name('myWaiterIndex')->middleware('permission:workerStatisticsShow');
        Route::get('/customer/{year}', 'ApiStatisticsController@customerYearStatisticsIndex')->name('customerYearIndex')->middleware('permission:statisticsShow');
        Route::get('/customer-interval/{from}/{to}', 'ApiStatisticsController@customerIntervalStatisticsIndex')->name('customerIntervalIndex')->middleware('permission:statisticsShow');
        Route::get('/favourite-dishes', 'ApiStatisticsController@favouriteDishesStatisticsIndex')->name('favouriteDishesIndex')->middleware('permission:statisticsShow');
    });
});