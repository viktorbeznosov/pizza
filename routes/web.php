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
Route::get('/menu', 'MenuController@show')->name('menu');
Route::get('/services', 'ServicesController@show')->name('services');
Route::get('/blog/{id?}', 'BlogController@show')->name('blog');
Route::get('/about', 'AboutController@show')->name('about');
Route::get('/contact', 'ContactController@show')->name('contact');


Route::get('/admin/login',['as' => 'admin.login','uses' => 'Admin\Auth\LoginController@showLoginForm']);
Route::post('/admin/login',['uses' => 'Admin\Auth\LoginController@login'])->name('admin.post.login');
Route::get('/admin/logout',['as' => 'admin.logout','uses' => 'Admin\Auth\LoginController@logout']);

Route::group(['prefix' => 'admin','as' => 'admin.','middleware' => 'isAdmin'], function (){

    Route::get('/', 'Admin\IndexController@show')->name('dashboard');
    Route::resource('/cat','Admin\CategoriesController');
    Route::resource('/products','Admin\ProductsController');
    Route::resource('/blogs','Admin\BlogsController');
    Route::group(['prefix' => 'comments','as' => 'comments.'], function (){
        Route::get('/', 'Admin\CommentsController@index')->name('index');
    });
    Route::resource('/services','Admin\ServicesController');
    Route::resource('/users','Admin\UsersController');
    Route::resource('/admins','Admin\AdminsController');

});


Auth::routes();
