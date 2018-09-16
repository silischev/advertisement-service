<?php

namespace App\Core\Advertisement\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AdvertisementCollection extends ResourceCollection
{
    /**
     * @var array
     */
    private $pagination;

    public function __construct(Advertisement $resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];

        parent::__construct($resource);
    }


    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'pagination' => $this->pagination,
        ];
    }
}
