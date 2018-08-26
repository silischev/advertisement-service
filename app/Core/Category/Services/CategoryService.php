<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Category;
use Illuminate\Support\Collection;

class CategoryService
{
    /**
     * Get categories sorted by level and parent
     * Example:
     *      '1' => ['name' => 'A', 'level' => 0], // Parent for B, C
     *      '2' => ['name' => 'B', 'level' => 1],
     *      '3' => ['name' => 'C', 'level' => 1],
     *      '4' => ['name' => 'D', 'level' => 0], // Parent
     *
     * @return array
     */
    public function getCategoriesAsSortedTree()
    {
        $categories = Category::orderBy('parent_id')->get();
        $sortedCategories = [];

        $categories->map(function ($category) use ($categories, &$sortedCategories) {
            if (empty($category->parent_id)) {
                $sortedCategories[$category->id] = [
                    'name' => $category->name,
                    'level' => 0,
                ];

                $this->buildCategoryBranch($category->id, 0, $sortedCategories, $categories);
            }
        });

        return $sortedCategories;
    }

    /**
     * @param int $parentId
     * @param int $level
     * @param array $branch
     * @param Collection $allCategories
     */
    private function buildCategoryBranch(int $parentId, int $level, array &$branch, Collection $allCategories)
    {
        $childCategories = $allCategories->where('parent_id', $parentId);

        if ($childCategories->count() === 0) {
            return;
        }

        $level++;
        $childCategories = $childCategories->map(function ($category) use (&$branch, $level, $allCategories) {
            $branch[$category->id] = [
                'name' => $category->name,
                'level' => $level,
            ];

            $this->buildCategoryBranch($category->id, $level, $branch, $allCategories);
        });
    }
}
