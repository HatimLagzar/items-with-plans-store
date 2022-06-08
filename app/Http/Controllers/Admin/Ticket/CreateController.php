<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.tickets.create');
    }
}
