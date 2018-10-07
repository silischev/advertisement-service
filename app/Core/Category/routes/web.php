<?php

Route::group([
    'prefix' => 'admin/categories',
    'middleware' => 'can:admin-panel',
], function () {
    Route::get('/', 'CategoryController@index')->name('categories.index');
    Route::get('/attributes-types', 'AttributeController@index')->name('attributes.types.list');
    Route::get('/attributes-types/{type}', 'AttributeController@attributesByType')->name('attributes.list_by_type');
});

Route::get('/categories/list', 'CategoryController@categoriesList')->name('categories.list');