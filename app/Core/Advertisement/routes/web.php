<?php

Route::group([
    'prefix' => 'advertisements',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::get('/create', 'AdvertisementController@create')->name('advertisements.create');
    Route::post('/store', 'AdvertisementController@store')->name('advertisements.store');
});