<?php

namespace App\Core\Category\Services;

use App\Core\Category\Dto\AttributeDto;
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
     * @return AttributeDto[]
     */
    public function getByType(string $type)
    {
        $attributes = Attribute::where('type', $type)->get();
        $dto = [];

        $attributes->each(function ($item) use(&$dto) {
            $options = json_decode($item->options, true);

            $dto[] = new AttributeDto(
                $options['view'],
                $options['name'],
                $item->title,
                $options['variants'] ?? []
            );
        });

        return $dto;
    }

    public function getTypes()
    {
        return Attribute::getTypes();
    }
}
