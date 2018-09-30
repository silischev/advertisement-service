<?php

namespace App\Core\User\Events;

use App\Core\User\Models\User;

class UserRegister
{
    /**
     * @var User
     */
    public $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}