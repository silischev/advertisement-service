<?php

Breadcrumbs::for('categories.by_parent', function ($trail, $ancestors) {
    if (!empty($ancestors)) {
        $trail->push('Основные категории', route('categories.by_parent'));

        /*foreach ($ancestors as $ancestor) {
            $trail->push($ancestor->title, route('categories.by_parent', ['parent_id' => $category->parent_id]));
        }*/

        //$trail->push($category->name, route('categories.by_parent', ['parent_id' => $category->parent_id]));
    } else {
        $trail->push('Основные категории', route('categories.by_parent'));
    }
});