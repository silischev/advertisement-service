<?php

Route::group([
    'namespace' => 'AdminPanel',
    'prefix' => 'admin/categories',
], function () {
    Route::get('/', 'CategoryController@index')->name('index');
});