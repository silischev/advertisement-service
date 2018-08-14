<?php

namespace App\Core\User\Http\Controllers\Auth;

use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * @var AuthService
     */
    public $authService;

    protected $redirectTo = '/home';

    public function __construct(AuthService $authService)
    {
        $this->middleware('guest');
        $this->authService = $authService;
    }

    public function showRegistrationForm()
    {
        return view('user.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $user = $this->authService->register($data['name'], $data['email'], $data['password']);

        $this->guard()->login($user);

        return redirect($this->redirectTo);
    }
}
