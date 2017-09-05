<?php

/**
 * How to make this work
 *
 * Add the route the same as below
 * then create a class in the controllers directory
 * name the class exactly what you specified in the route
 * add a method in the class exactly what you specified in the route
 *
 * in case of Route::get('/about', 'AboutController@index');
 *
 * the '/about' is the route in the URL
 * the 'AboutController' is a class in the controller's directory
 * The 'index' is a method in that controller
 */

Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('register', 'RegisterController@index');
Route::post('register', 'RegisterController@register');