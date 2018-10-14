<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Category;
use App\Core\Common\Cache\CacheService;

class CategoryService
{
    /**
     * @var CacheService
     */
    private $cacheService;

    /**
     * @var CategoryBuildTreeService
     */
    private $treeService;

    /**
     * CategoryService constructor.
     *
     * @param CategoryBuildTreeService $treeService
     * @param CacheService $cacheService
     */
    public function __construct(CategoryBuildTreeService $treeService, CacheService $cacheService)
    {
        $this->cacheService = $cacheService;
        $this->treeService = $treeService;
    }

    /**
     * @return array
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function getAll()
    {
        $categories = $this->cacheService->get('categories.list');

        if (empty($categories)) {
            $categories = Category::orderBy('parent_id')
                ->get()
                ->toArray();

            $this->cacheService->set('categories.list', $categories);
        }

        return $this->treeService->getAsSortedTree($categories);
    }

    /**
     * @param int|null $parentId
     *
     * @return array
     */
    public function getByParent(int $parentId = null)
    {
        return Category::where('parent_id', $parentId)
            ->get()
            ->toArray();
    }

    public function getById(int $id)
    {
        return Category::findOrfail($id);
    }

    public function getCategoryAncestors(int $categoryId)
    {
        $ancestors = $this->cacheService->get('categories.ancestors.' . $categoryId);

        if (empty($ancestors)) {
            $sortedCategories = $this->getAll();
            $ancestors = $this->treeService->getAncestors($categoryId, $sortedCategories);

            $this->cacheService->set('categories.ancestors.' . $categoryId, $ancestors);
        }

        return $ancestors;
    }
}
