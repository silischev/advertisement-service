<?php

namespace App\Core\User\Services;

use App\Core\User\Http\Requests\Auth\AdminRegisterRequest;
use App\Core\User\Http\Requests\Auth\LoginRequest;
use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    use AuthenticatesUsers;

    /**
     * @var UserRoleService
     */
    private $userRoleService;

    /**
     * AuthService constructor.
     *
     * @param UserRoleService $userRoleService
     */
    public function __construct(UserRoleService $userRoleService)
    {
        $this->userRoleService = $userRoleService;
    }

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @param string $roleName
     *
     * @return User
     */
    public function register(string $name, string $email, string $password, string $roleName = User::ROLE_USER)
    {
        // @TODO send mail

        $user = $this->createUser($name, $email, $password);

        $this->userRoleService->attachToUser($roleName, $user);

        return $user;
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
     * @param string $name
     * @param string $email
     * @param string $password
     *
     * @return User
     */
    private function createUser(string $name, string $email, string $password): User
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}