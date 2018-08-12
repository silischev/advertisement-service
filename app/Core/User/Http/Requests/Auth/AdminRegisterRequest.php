<?php

namespace App\Core\User\Http\Requests\Auth;

use App\Core\User\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:3|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => Rule::in([User::ROLE_ADMINISTRATOR, User::ROLE_MODERATOR, User::ROLE_USER]),
        ];
    }
}