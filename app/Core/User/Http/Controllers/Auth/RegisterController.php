<?php

namespace App\Core\User\Http\Controllers\Auth;

use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Models\User;
use App\Core\User\Services\AuthService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    public function register(RegisterRequest $request, AuthService $authService)
    {
        $this->authService->register($request);

        //return response('', Response::HTTP_CREATED);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
