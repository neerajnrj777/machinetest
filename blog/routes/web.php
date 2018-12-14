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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/userlist', 'DashboardController@userlist')->name('userlist');
Route::any('/useredit', 'DashboardController@useredit')->name('useredit');
Route::any('/changepassword', 'DashboardController@changepassword')->name('changepassword');
Route::any('/productlist', 'ProductController@index')->name('productlist');
Route::any('/productadd', 'ProductController@addproduct')->name('productadd');
Route::any('/productdelete', 'ProductController@productdelete')->name('productdelete');
Route::any('/viewimage', 'ProductController@viewimage')->name('viewimage');
Route::any('/deleteimage', 'ProductController@deleteimage')->name('imgdelete');
