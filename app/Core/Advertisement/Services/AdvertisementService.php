<?php

namespace App\Core\Advertisement\Services;

use App\Core\Advertisement\Models\Advertisement;
use App\Core\Advertisement\Requests\StoreRequest;
use App\Core\User\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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
     * @param User $user
     * @param int|null $categoryId
     * @param int $limit
     *
     * @return LengthAwarePaginator
     */
    public function getByUser(User $user, ?int $categoryId = null, int $limit = 5)
    {
        return $user->advertisements()->paginate($limit);
    }
}
