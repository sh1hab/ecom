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

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/', 'FrontController@index')->name('home');
Route::get('/shirts', 'FrontController@shirts')->name('shirts');
Route::get('/shirt', 'FrontController@shirts')->name('shirt');

Route::resource('/cart','CartController');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/',function(){
		return view('admin.index');
	} )->name('admin.index');

	// Route::get('/create',function(){
	// 	return view('admin.products.create');
	// });

	Route::resource('products','ProductController');
	Route::resource('categories','CategoryController');

} );


Route::group(['middleware'=>'auth'],function(){

} );
