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

Route::get('/', function () {
	
});

Route::auth();

Route::get('/home', 'HomeController@index');

// Image glide
Route::get('/img/{all}', 'GlideController@index')->where('all', '.*')->name('image');
