<?php

Route::group([
    'prefix' => 'advertisements',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::get('/user-advertisements', 'AdvertisementController@userAdvertisements')
        ->middleware('auth')
        ->name('advertisements.user-advertisements');
    Route::get('/create', 'AdvertisementController@create')
        ->middleware('auth')
        ->name('advertisements.create');
    Route::post('/store', 'AdvertisementController@store')
        ->middleware('auth')
        ->name('advertisements.store');
});