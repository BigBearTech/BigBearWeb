<?php

Route::get('/', 'AdminController@index')->name('admin.index');

Route::resource('posts', 'PostController');
Route::resource('pages', 'PageController');
Route::resource('users', 'UserController');
Route::resource('comments', 'CommentController');
Route::resource('media', 'MediaController');
Route::resource('gallery', 'GalleryController');
Route::resource('gallery.album', 'GalleryAlbumController');
Route::resource('testimonials', 'TestimonialController');
Route::resource('faqgroups', 'FaqGroupController');
Route::resource('faqgroups.faqs', 'FaqGroupFaqController');