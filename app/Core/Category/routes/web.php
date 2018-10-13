<?php

Route::group([
    'prefix' => 'admin/categories',
    'middleware' => 'can:admin-panel',
], function () {
    Route::get('/{parent_id?}', 'CategoryController@index')->name('categories.by_parent');
    Route::get('/attributes-types', 'AttributeController@index')->name('attributes.types.list');
    Route::get('/attributes-types/{type}', 'AttributeController@attributesByType')->name('attributes.list_by_type');
});

Route::get('/categories/list', 'CategoryController@categoriesList')->name('categories.list');