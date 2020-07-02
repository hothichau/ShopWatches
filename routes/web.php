<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

//------------------------------Login------------------------------------------

Route::get('/auth/login',"Auth\LoginController@operator")->name('auth.login');
Route::post('/auth/login',"Auth\LoginController@login");

//------------------------------Register---------------------------------------

Route::get('/auth/register',"Auth\RegisterController@operator")->name('auth.register');
Route::post('/auth/register',"Auth\RegisterController@register");

//------------------------------Logout-----------------------------------------

Route::get('/auth/logout',"Auth\LoginController@logout");

//------------------------------Admin------------------------------------------

Route::group(['middleware' => 'App\Http\Middleware\CheckLogin'], function()
{

//------------------------------Admin/Dashboard--------------------------------

Route::get('/admin/dashboard',"Admin\DashboardController@operator")->name('admin.dashboard'); 

//------------------------------Admin/Users------------------------------------
Route::get('/admin/users/create', 'Admin\Users\UserController@operator');
Route::post('/admin/users','Admin\Users\UserController@store');
Route::get('/admin/users/{id}/edit','Admin\Users\UserController@edit');
Route::get('/admin/users','Admin\Users\UserController@index')->name('admin.users.index'); 
Route::patch('/admin/users/{id}','Admin\Users\UserController@update');
Route::delete('/admin/users/{id}','Admin\Users\UserController@destroy');

//------------------------------Admin/Watches---------------------------------

Route::get('/admin/watches/create', 'Admin\Watches\WatchController@operator');
Route::get('/admin/watches', 'Admin\Watches\WatchController@index')->name('admin.watches.index');

Route::get('/admin/watchess/{id}/edit','Admin\Watches\WatchController@edit1');

Route::post('/admin/watches','Admin\Watches\WatchController@store');
Route::get('/admin/watches/{id}/edit','Admin\Watches\WatchController@edit');
Route::patch('/admin/watches/{id}','Admin\Watches\WatchController@update');
Route::delete('/admin/watches/{id}','Admin\Watches\WatchController@destroy');
});
//------------------------------User------------------------------------------

Route::get('/user/home', 'User\HomeController@index')->name('user.home');

//------------------------------Cart------------------------------------------

Route::get('/cart',"User\CartController@index");
Route::get('/addToCart/{id}','User\CartController@addToCart');
Route::delete('/cart/{id}','User\CartController@destroyCartPro');
Route::get('/cart/{id}/increase','User\CartController@increaseQuantity');
Route::get('/cart/{id}/decrease','User\CartController@decreaseQuantity');


//------------------------------Detailed------------------------------------------

Route::get('/user/watches/{id}/show', 'Admin\Watches\WatchController@detail');


//------------------------------User------------------------------------------

Route::post('/search', 'User\HomeController@searchByProName');

//------------------------------Admin/Category---------------------------------

Route::get('/admin/categories/create', 'Admin\Categories\CategoryController@operator');
Route::get('/admin/categories', 'Admin\Categories\CategoryController@index')->name('admin.categories.index');
Route::post('/admin/categories','Admin\Categories\CategoryController@store');
Route::get('/admin/categories/{id}/edit','Admin\Categories\CategoryController@edit');
Route::patch('/admin/categories/{id}','Admin\Categories\CategoryController@update');
Route::delete('/admin/categories/{id}','Admin\Categories\CategoryController@destroy');

Route::get('/admin/categoriess','Admin\Categories\CategoryController@displayCate');
Route::get('/categories/{id}', 'User\HomeController@displayProCate');

//------------------------------Admin/Order---------------------------------
Route::get('/admin/orders', 'User\OrderController@showBill');
//------------------------------Order---------------------------------
Route::get('/orders', 'User\OrderController@showOrder');
Route::get('/order', 'User\OrderController@order');
Route::get('/bill', 'User\OrderController@showBill');

//------------------------------Arrange Product---------------------------------
Route::get('/ascPrice', 'User\HomeController@ascProductByPrice');
Route::get('/descPrice', 'User\HomeController@descProductByPrice');

//------------------------------Error---------------------------------
//Route::get('/403', 'User\HomeController@ascProductByPrice');

