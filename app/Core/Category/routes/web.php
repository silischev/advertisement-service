<?php

Route::group([
    'prefix' => 'admin/categories',
    'middleware' => 'can:admin-panel',
], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/attributes', 'AttributeController@index')->name('attributes.index');
});

Route::get('/categories/list', 'CategoryController@categoriesList')->name('categories.list');