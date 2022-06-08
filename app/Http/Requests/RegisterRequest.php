<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:3', 'max:255'],
            'email'    => ['required', 'email'],
            'password' => ['required', 'confirmed'],
            'country'  => ['required', 'numeric'],
        ];
    }
}
