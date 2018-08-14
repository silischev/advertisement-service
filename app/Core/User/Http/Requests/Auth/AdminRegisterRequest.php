<?php

namespace App\Core\User\Http\Requests\Auth;

use App\Core\User\Models\User;
use Illuminate\Validation\Rule;

class RegisterByAdminRequest extends RegisterRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $parentRules = parent::rules();

        $rules = [
            'role' => [
                Rule::in([User::ROLE_ADMINISTRATOR, User::ROLE_MODERATOR, User::ROLE_USER])
            ],
        ];

        return array_merge($parentRules, $rules);
    }
}
