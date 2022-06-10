<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'first_name'   => ['required', 'string', 'max:191'],
            'last_name'    => ['required', 'string', 'max:191'],
            'email'        => ['required', 'email', 'max:191'],
            'phone'        => ['required', 'max:15'],
            'payment_type' => ['required', 'min:1', 'max:3', 'numeric']
        ];
    }
}
