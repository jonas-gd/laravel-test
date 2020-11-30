<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'web'],function(){
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
});

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	// routes profile
	Route::get('profile', 'App\Http\Controllers\ProfileController@edit')->name('profile.edit');
	Route::put('profile', 'App\Http\Controllers\ProfileController@update')->name('profile.update');	
	Route::put('profile/password', 'App\Http\Controllers\ProfileController@password')->name('profile.password');
	
	// routes customer
	Route::get('customers', 'App\Http\Controllers\CustomersController@index')->name('customers');
	Route::get('customer/new', 'App\Http\Controllers\CustomersController@create')->name('newcustomer');
	Route::post('customer/save', 'App\Http\Controllers\CustomersController@store')->name('customer.save');
	Route::get('customer/edit/{id}', 'App\Http\Controllers\CustomersController@edit')->name('editcustomer');
	Route::post('customer/update/{id}', 'App\Http\Controllers\CustomersController@update')->name('updatecustomer');
	Route::get('customer/delete/{id}', 'App\Http\Controllers\CustomersController@delete')->name('customer.delete');

	// routes numbers
	Route::get('numbers/{id}', 'App\Http\Controllers\NumbersController@index')->name('numbers');

	// number livewire
	Route::view('number/customer/{id}','livewire.home')->name('number.customer');

	Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

