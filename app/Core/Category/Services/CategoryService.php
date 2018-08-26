<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Category;

class CategoryService
{
    /**
     * @return array
     */
    public function getAll()
    {
        $categories = Category::orderBy('parent_id')
            ->get()
            ->toArray();

        return (new CategoryBuildTreeService($categories))->getAsSortedTree();
    }
}
