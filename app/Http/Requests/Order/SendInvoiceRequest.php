<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class SendInvoiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'invoice_url' => ['required', 'url', 'max:191']
        ];
    }
}
