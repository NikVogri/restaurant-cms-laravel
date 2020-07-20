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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    // Dashboard
    Route::get('/cms', 'DashboardController@index')->name('dashboard.index');
    // Order
    Route::get('/cms/orders', 'OrdersController@index')->name('orders.index');

    // Categories
    Route::get('/cms/categories', 'CategoriesController@index')->name('categories.index');
    Route::get('/cms/categories/create', 'CategoriesController@create')->name('categories.create');
    Route::post('cms/categories/store', 'CategoriesController@store')->name('categories.store');
    Route::get('/cms/categories/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::put('/cms/items/{category}/update', 'CategoriesController@update')->name('categories.update');
    Route::delete('/cms/items/{category}/destroy', 'CategoriesController@destroy')->name('categories.destroy');

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
    Route::put('/cms/users/{user}/update', 'UsersController@update')->name('users.update');
    // vvvv ban users vvv
    Route::delete('/cms/users/{item}/destroy', 'UsersController@destroy')->name('users.destroy');

    // Payments
    Route::get('/cms/payments', 'PaymentsController@index')->name('payments.index');
});

Auth::routes();