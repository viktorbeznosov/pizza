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

