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

Route::get('auth/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleProviderCallback');

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
	Route::resource('address','AddressController');
//optionla parameter ? 
	Route::get('/orders/{type?}' , 'OrderController@showOrders');
	Route::post('/toggle/{id}' ,   'OrderController@toggleOrders');

} );

Route::group(['middleware'=>'auth'],function(){

	Route::get('/checkout','checkoutController@step1');
	Route::get('shipping-info','checkoutController@shipping')->name('checkout.shipping');
	Route::post('store-payment','checkoutController@storePayment')->name('payment.store');
} );


