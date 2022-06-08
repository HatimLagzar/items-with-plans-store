<?php

namespace App\Http\Requests\Ticket;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title'                => ['required', 'string', 'max:191'],
            'city'                 => ['required', 'string', 'max:191'],
            'location'             => ['required', 'string', 'max:191'],
            'date_and_time'        => ['required', 'date'],
            'ticket_plans.*.name'  => ['required', 'string', 'max:191'],
            'ticket_plans.*.price' => ['required', 'numeric'],
            'ticket_plans.*.stock' => ['required', 'numeric'],
        ];
    }
}
