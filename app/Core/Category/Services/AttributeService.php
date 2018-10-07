<?php

namespace App\Core\Category\Services;

use App\Core\Category\Models\Attribute;
use App\Core\Common\Cache\CacheService;
use Illuminate\Support\Collection;

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

    public function get()
    {
        $attributes = Attribute::all();

        return $attributes;
    }

    /**
     * @param string $type
     *
     * @return Collection
     */
    public function getByType(string $type)
    {
        return Attribute::where('type', $type)->get();
    }

    public function getTypes()
    {
        return Attribute::getTypes();
    }
}
