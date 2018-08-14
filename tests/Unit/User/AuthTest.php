<?php

namespace Tests\Unit\User;

use App\Core\User\Http\Requests\Auth\RegisterRequest;
use App\Core\User\Models\User;
use App\Core\User\Services\AuthService;
use App\Core\User\Services\UserRoleService;
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

    /**
     * @var UserRoleService
     */
    public $userRoleService;

    protected function setUp()
    {
        parent::setUp();

        $this->userRoleService = new UserRoleService();
        $this->authService = new AuthService($this->userRoleService);
    }

    public function testUserRegister()
    {
        $userData = [
            'name' => 'test_name',
            'email' => 'test_test@email.ru',
            'password' => 'test_password',
        ];

        $request = new RegisterRequest();
        $request->initialize([], $userData);

        $user = $this->authService->register($userData['name'], $userData['email'], $userData['password']);

        $this->assertNotEmpty($user);

        $this->assertEquals($userData['name'], $user->name);
        $this->assertEquals($userData['email'], $user->email);
        $this->assertNotEquals($userData['password'], $user->password);

        $this->assertTrue($this->userHasOneRole($user));
        $this->assertEquals($this->userRoleService->getRole($user), User::ROLE_USER);
    }

    private function userHasOneRole(User $user)
    {
        $userRoles = $this->userRoleService->getRole($user);

        return $this->count($userRoles) === 1;
    }
}
