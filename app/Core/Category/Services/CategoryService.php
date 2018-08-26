<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Category;

class CategoryService
{
    public function getCategoriesAsTree()
    {
        $categories = Category::all();
        //dd($categories->pluck('name', 'id'));
    }
}
