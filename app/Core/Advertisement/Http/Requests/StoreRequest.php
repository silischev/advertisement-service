<?php

namespace App\Core\Advertisement\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'price' => 'required|integer',
            'description' => 'required|max:300',
            'category_id' => 'required|integer',
            'user_id' => 'required|integer',
            'address' => 'required|string|max:50',
            'phone' => 'required|string|max:12',
            'images' => 'json',
            'images.*' => 'string|max:255'
        ];
    }
}
