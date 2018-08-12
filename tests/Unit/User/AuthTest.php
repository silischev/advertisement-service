<?php

namespace Tests\Unit\User;

use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Services\AuthService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var AuthService
     */
    public $authService;

    protected function setUp()
    {
        parent::setUp();
        $this->authService = new AuthService();
    }

    public function testUserRegister()
    {
        $userData = [
            'name' => 'name',
            'email' => 'test@email.ru',
            'password' => 'password',
        ];

        $request = new RegisterRequest();
        $request->initialize([], $userData);

        $user = $this->authService->register($request);

        $this->assertNotEmpty($user);

        $this->assertEquals($userData['name'], $user->name);
        $this->assertEquals($userData['email'], $user->email);
        $this->assertNotEquals($userData['password'], $user->password);
    }
}
