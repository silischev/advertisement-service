<?php

namespace App\Core\User\Services;

use App\Core\Common\Jobs\SendEmail;
use App\Core\User\Http\Requests\Auth\AdminRegisterRequest;
use App\Core\User\Http\Requests\Auth\LoginRequest;
use App\Core\User\Models\User;
use App\Mail\UserRegister;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthService
{
    use AuthenticatesUsers;

    /**
     * @var UserRoleService
     */
    private $userRoleService;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * AuthService constructor.
     *
     * @param UserRoleService $userRoleService
     * @param Mailer $mailer
     */
    public function __construct(UserRoleService $userRoleService, Mailer $mailer)
    {
        $this->userRoleService = $userRoleService;
        $this->mailer = $mailer;
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
        $user = $this->createUser($name, $email, $password);
        $this->userRoleService->attachToUser($roleName, $user);

        $message = (new UserRegister())
            ->onQueue('mails');

        $this->mailer
            ->to($user)
            ->queue($message);

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