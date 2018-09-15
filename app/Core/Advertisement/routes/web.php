<?php

Route::group([
    'prefix' => 'advertisements',
    'middleware' => 'auth',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::get('/create', 'AdvertisementController@create')->name('advertisements.create');
    Route::get('/store', 'AdvertisementController@create')->name('advertisements.store');
});