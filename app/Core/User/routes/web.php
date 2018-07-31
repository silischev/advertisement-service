<?php

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/password-request', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password-request', 'Auth\ResetPasswordController@reset');
Route::any('/password-reset', 'Auth\ResetPasswordController@showResetForm')->name('password.email');
