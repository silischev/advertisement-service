<?php

namespace App\Core\User\Services;

use App\Core\User\Http\Requests\Auth\LoginRequest;
use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    use AuthenticatesUsers;

    /**
     * Register new user
     *
     * @param RegisterRequest $request
     *
     * @return User
     */
    public function register(RegisterRequest $request)
    {
        // @TODO send mail

        return $this->createUser($request);
    }

    /**
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(LoginRequest $request)
    {
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
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