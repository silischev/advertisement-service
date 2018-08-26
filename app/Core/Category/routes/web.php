<?php

Route::group([
    'prefix' => 'admin/categories',
    'middleware' => 'can:admin-panel',
], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
});