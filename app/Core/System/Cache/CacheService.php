<?php

namespace App\Core\System\Cache;

use Illuminate\Contracts\Cache\Repository;

class CacheService
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * CacheService constructor.
     *
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get(string $name)
    {
        return $this->repository->get($name);
    }

    /**
     * @param string $name
     * @param $value
     * @param int $minutes
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function set(string $name, $value, int $minutes = 43200)
    {
        return $this->repository->set($name, $value, $minutes);
    }

}