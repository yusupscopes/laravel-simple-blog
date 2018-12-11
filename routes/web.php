<?php

Route::get('/', 'PostController@index')->name('blog');

Route::get('/categories', 'PostController@categories')->name('categories');
Route::get('/category/{category}', 'PostController@category')->name('category');

Route::get('/blog/{post}', 'PostController@show')->name('blog.single');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
