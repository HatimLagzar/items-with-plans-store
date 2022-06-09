<?php

namespace App\Http\Requests;

use App\DTO\Phone\Phone;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:191'],
            'last_name'  => ['required', 'string', 'min:3', 'max:191'],
            'email'      => ['required', 'email'],
            'password'   => ['required', 'confirmed'],
            'phone'      => ['required', 'string', 'regex:'.Phone::getRegex()],
        ];
    }
}
