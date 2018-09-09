<?php

namespace App\Core\Advertisement\Http\Controllers;

use App\Core\Advertisement\Requests\StoreRequest;
use App\Core\Advertisement\Services\AdvertisementService;

class AdvertisementController
{
    /**
     * @var AdvertisementService
     */
    private $advertisementService;

    public function __construct(AdvertisementService $advertisementService)
    {
        $this->advertisementService = $advertisementService;
    }

    public function index()
    {
        // @TODO
        return view('advertisements.index');
    }

    public function create()
    {
        return view('advertisements.create');
    }

    public function store(StoreRequest $request)
    {
        $user = \Auth::user();
        $this->advertisementService->create($user->id, $request);

        return route('advertisement.index');
    }

    public function show($id)
    {
        // @TODO
    }

    public function update($id)
    {
        // @TODO
    }

    public function destroy($id)
    {
        // @TODO
    }
}