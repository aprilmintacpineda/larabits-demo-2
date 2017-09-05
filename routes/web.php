<?php

Route::get('/', 'HomeController@index');
Route::get('about', 'AboutController@index');
Route::get('404', 'NotFoundController@index');