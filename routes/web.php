<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
    'namespace' => 'AdminPanel',
    'prefix' => 'admin',
    'middleware' => 'can:admin-panel',
], function () {
    Route::get('/', 'AdminController@index')->name('index');
});