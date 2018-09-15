<?php

Route::group([
    'prefix' => 'advertisements',
    //'middleware' => 'can:admin-panel',
], function () {
    Route::get('/', 'AdvertisementController@index')->name('advertisements.index');
    Route::get('/create', 'AdvertisementController@create')->name('advertisements.create');
    Route::get('/store', 'AdvertisementController@create')->name('advertisements.store');
});