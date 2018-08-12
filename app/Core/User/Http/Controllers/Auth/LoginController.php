<?php

namespace App\Core\User\Http\Controllers\Auth;

use App\Core\User\Http\Requests\Auth\LoginRequest;
use App\Core\User\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * @var AuthService
     */
    public $authService;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->middleware('guest')->except('logout');
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $this->authService->login($request);

        return redirect($this->redirectTo);
    }
}
