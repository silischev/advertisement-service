<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Category;
use App\Core\System\Cache\CacheService;

class CategoryService
{
    /**
     * @var CacheService
     */
    private $cacheService;

    /**
     * CategoryService constructor.
     *
     * @param CacheService $cacheService
     */
    public function __construct(CacheService $cacheService)
    {
        $this->cacheService = $cacheService;
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

        return (new CategoryBuildTreeService($categories))->getAsSortedTree();
    }
}
