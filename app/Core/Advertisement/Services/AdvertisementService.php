<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Models\Advertisement;
use App\Core\Advertisement\Requests\StoreRequest;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class AdvertisementService
{
    /**
     * @param int $userId
     * @param StoreRequest $request
     *
     * @return Advertisement
     */
    public function create(int $userId, StoreRequest $request)
    {
        $advertisement = Advertisement::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'category_id' => $request->get('category_id'),
            'user_id' => $userId,
        ]);

        return $advertisement;
    }

    /**
     * @param int $id
     * @param int $limit
     *
     * @return LengthAwarePaginator
     */
    public function getByUser(int $id, int $limit = 5)
    {
        return Advertisement::where('user_id', $id)->paginate($limit);
    }
}
