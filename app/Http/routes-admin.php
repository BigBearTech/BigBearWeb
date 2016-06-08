<?php

Route::get('/', 'AdminController@index');

Route::resource('posts', 'PostController');
Route::resource('pages', 'PageController');
Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');
Route::resource('media', 'MediaController');