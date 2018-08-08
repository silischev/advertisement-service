<?php

namespace App\Core\User\Services;

use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Register new user
     *
     * @param RegisterRequest $request
     *
     * @return User
     */
    public function register(RegisterRequest $request)
    {
        return $this->createUser($request);
    }

    /**
     * @param RegisterRequest $request
     *
     * @return User
     */
    private function createUser(RegisterRequest $request): User
    {
        return User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
    }
}