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

Route::get('/','IndexController@home')->name('home');
Route::get('/menu/{id?}', 'MenuController@show')->name('menu');
Route::get('/services', 'ServicesController@show')->name('services');
Route::get('/blog/{id?}', 'BlogController@show')->name('blog');
Route::get('/about', 'AboutController@show')->name('about');
Route::get('/contact', 'ContactController@show')->name('contact');
Route::get('/account', 'AccountController@show')->name('account');
Route::get('/cart', 'CartController@show')->name('cart');
Route::post('/order', 'OrderController@create')->name('order');
Route::post('/check_user', 'OrderController@checkUser')->name('check_user');
Route::post('/account', 'AccountController@update')->name('account_update');
Route::get('orders/{user_id}/{order_id?}', 'OrderController@show')->name('orders');
Route::post('/comment', 'CommentsController@store')->name('comment');


Route::get('/admin/login',['as' => 'admin.login','uses' => 'Admin\Auth\LoginController@showLoginForm']);
Route::post('/admin/login',['uses' => 'Admin\Auth\LoginController@login'])->name('admin.post.login');
Route::get('/admin/logout',['as' => 'admin.logout','uses' => 'Admin\Auth\LoginController@logout']);

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'isAdmin'], function (){

    Route::get('/', 'Admin\IndexController@show')->name('dashboard');
    Route::resource('/cat','Admin\CategoriesController');
    Route::resource('/products','Admin\ProductsController');
    Route::resource('/blogs','Admin\BlogsController');
    Route::resource('/orders','Admin\OrdersController');
    Route::group(['prefix' => 'comments','as' => 'comments.'], function (){
        Route::get('/{blog_id?}', 'Admin\CommentsController@index')->name('index');
        Route::get('/edit/{id}', 'Admin\CommentsController@edit')->name('edit');
        Route::post('/update/{id}','Admin\CommentsController@update')->name('update');
        Route::delete('/{id}','Admin\CommentsController@destroy')->name('destroy');
    });
    Route::group(['prefix' => 'products', 'as' => 'products.'], function(){
        Route::get('/edit/{id?}/{catId?}', 'Admin\ProductsController@productCatEdit' )->name('product_cat_edit');
        Route::get('/create/{catId}', 'Admin\ProductsController@productCatCreate' )->name('product_cat_create');
    });
    Route::resource('/services','Admin\ServicesController');
    Route::resource('/users','Admin\UsersController');
    Route::resource('/admins','Admin\AdminsController');
    
    Route::group(['prefix' => 'notifications', 'as' => 'notifications.'], function(){
        //Route::post('/create', 'Admin\NotificationsController@create')->name('notification_create');
        Route::post('/read', 'Admin\NotificationsController@read')->name('notification_read');
    });

});


Auth::routes();
