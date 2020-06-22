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

Route::get('/carta', function () {
    return view('/user/cart');
});

//------------------------------Login------------------------------------------

Route::get('/auth/login',"Auth\LoginController@operator")->name('auth.login');
Route::post('/auth/login',"Auth\LoginController@login");

//------------------------------Register---------------------------------------

Route::get('/auth/register',"Auth\RegisterController@operator")->name('auth.register');
Route::post('/auth/register',"Auth\RegisterController@register");

//------------------------------Logout-----------------------------------------

Route::get('/auth/logout',"Auth\LoginController@logout");

//------------------------------Admin/Dashboard--------------------------------

Route::get('/admin/dashboard',"Admin\DashboardController@operator")->name('admin.dashboard'); 

//------------------------------Admin/Users------------------------------------
Route::get('/admin/users/create', 'Admin\Users\UserController@operator');
Route::post('/admin/users','Admin\Users\UserController@store');
Route::get('/admin/users','Admin\Users\UserController@index')->name('admin.users.index'); 
Route::patch('/admin/users/{id}','Admin\Users\UserController@update');
Route::delete('/admin/users/{id}','Admin\Users\UserController@destroy');

//------------------------------Admin/Watches---------------------------------

Route::get('/admin/watches/create', 'Admin\Watches\WatchController@operator');
Route::get('/admin/watches', 'Admin\Watches\WatchController@index')->name('admin.watches.index');
Route::post('/admin/watches','Admin\Watches\WatchController@store');
Route::get('/admin/watches/{id}/edit','Admin\Watches\WatchController@edit');
Route::patch('/admin/watches/{id}','Admin\Watches\WatchController@update');
Route::delete('/admin/watches/{id}','Admin\Watches\WatchController@destroy');

//------------------------------User------------------------------------------

Route::get('/user/home', 'User\HomeController@index')->name('user.home');
Route::get('/user/cart/{id}/cart','User\HomeController@addToCart');
Route::get('/user/cart/','User\HomeController@cart');
Route::get('/user/watches/{id}/show', 'Admin\Watches\WatchController@detail');
Route::delete('/user/cart/{id}','User\HomeController@destroy');


//------------------------------User------------------------------------------

Route::get('/cart', 'User\CartController@index');

Route::post('/admin/watches/find', 'User\HomeController@search');