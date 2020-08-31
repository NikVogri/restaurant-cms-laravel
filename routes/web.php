<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WelcomeController@index');

// Contact Form
Route::get('/contacts', 'ContactsController@index')->name('contacts.index');
Route::get('/contacts/{contact}/show', 'ContactsController@show')->name('contacts.show');
Route::put('/contacts/{contact}/update', 'ContactsController@update')->name('contacts.update');
Route::post('/send-contact', 'ContactsController@store')->name('contacts.store');



Route::group(['middleware' => ['auth']], function () {

    // Dashboard
    Route::get('/cms', 'DashboardController@index')->name('dashboard.index');

    // Orders
    Route::get('/cms/orders', 'OrdersController@index')->name('orders.index');
    Route::get('/cms/orders/{order}/show', 'OrdersController@show')->name('orders.show');
    Route::get('/orders/create-new-order', 'OrdersController@store')->name('orders.create-new-order');
    Route::put('/cms/orders/{order}/complete', 'OrdersController@complete')->name('orders.complete');
    Route::put('/cms/orders/{order}/undo-complete', 'OrdersController@undoComplete')->name('orders.undo-complete');

    // Completed
    Route::get('/cms/orders/new', 'OrdersController@new')->name('orders.new');
    Route::get('/cms/orders/completed', 'OrdersController@completed')->name('orders.completed');

    // Categories
    Route::get('/cms/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/cms/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('cms/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('/cms/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::put('/cms/categories/{category}/update', 'CategoriesController@update')->name('categories.update');
    Route::delete('/cms/categories/{category}/destroy', 'CategoriesController@destroy')->name('categories.destroy');

    // Items
    Route::get('/cms/items', 'ItemsController@index')->name('items.index');
    Route::get('/cms/items/create', 'ItemsController@create')->name('items.create');
    Route::post('/cms/items/store', 'ItemsController@store')->name('items.store');
    Route::get('/cms/items/{item}/edit', 'ItemsController@edit')->name('items.edit');
    Route::put('/cms/items/{item}/update', 'ItemsController@update')->name('items.update');
    Route::delete('/cms/items/{item}/destroy', 'ItemsController@destroy')->name('items.destroy');

    // Users
    Route::get('/cms/users', 'UsersController@index')->name('users.index');
    // vvv promote user vvv
    Route::get('/cms/users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::put('/cms/users/{user}/update', 'UsersController@updateRole')->name('users.update');
    // vvvv remove users vvv
    Route::delete('/cms/users/{item}/destroy', 'UsersController@destroy')->name('users.destroy');


    // Payments
    Route::get('/cms/payments', 'PaymentsController@index')->name('payments.index');
    Route::get('/cms/payments/create', 'PaymentsController@create')->name('payments.create');
    Route::post('/cms/payments/store', 'PaymentsController@store')->name('payments.store');
    Route::get('/cms/payments/{payment}/edit', 'PaymentsController@edit')->name('payments.edit');
    Route::put('/cms/payments/{payment}/update', 'PaymentsController@update')->name('payments.update');
    Route::delete('/cms/payments/{payment}/destroy', 'PaymentsController@destroy')->name('payments.destroy');


    // Front end
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::post('/cart/{item}/store', 'CartController@store')->name('cart.store');
    Route::delete('/cart/{item}/destroy', 'CartController@destroy')->name('cart.destroy');
    Route::put('/cart/{item}/update', 'CartController@update')->name('cart.update');

    // Messages
    Route::get('/cms/messages', 'MessagesController@index')->name('messages.index');
    Route::get('/cms/messages/create', 'MessagesController@create')->name('messages.create');
    Route::post('/cms/messages/store', 'MessagesController@store')->name('messages.store');
    Route::get('/cms/messages/{message}/show', 'MessagesController@show')->name('messages.show');
    Route::put('/cms/messages/{message}/update', 'MessagesController@update')->name('messages.update');

    // Alerts
    Route::get('/cms/alerts/all', 'AlertsController@index')->name('alerts.index');
    Route::patch('/cms/alerts/{alert}/complete', 'AlertsController@update')->name('alerts.complete');


    // Profile
    Route::get('/cms/profile', 'UsersController@profile')->name('users.profile');
    Route::get('/cms/address', 'UsersController@address')->name('users.address');
    Route::put('/cms/user/update-profile', 'UsersController@updateProfile')->name('users.updateProfile');
    Route::post('/cms/user/add-address', 'UsersController@addAddress')->name('users.addAddress');
    Route::put('/cms/user/update-address', 'UsersController@updateAddress')->name('users.updateAddress');


    // Coupons
    Route::get('/cms/coupons', 'CouponController@index')->name('coupons.index');
    Route::get('/cms/coupons/create', 'CouponController@create')->name('coupons.create');
    Route::post('/cms/coupons', 'CouponController@store')->name('coupons.store');
});




Auth::routes();