<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Attribute;
use App\Core\Common\Cache\CacheService;

class AttributeService
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

    public function getAll()
    {
        $attributes = Attribute::all();

        return $attributes;
    }
}
