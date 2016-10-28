<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin','namespace' => 'Backend' ], function () {
	Route::resource('tour', 'TourController');
	Route::resource('food', 'FoodController');
	Route::resource('hotel', 'HotelController');
	Route::resource('experience', 'ExperienceController');
	Route::resource('rent', 'RentController');
	Route::resource('news', 'NewsController');
	Route::resource('user', 'UserController');
});
Route::get('/', function(){
	return view('backend.layouts.master');
});