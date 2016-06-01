<?php

Route::get('/', 'AdminController@index');

Route::resource('posts', 'PostController');