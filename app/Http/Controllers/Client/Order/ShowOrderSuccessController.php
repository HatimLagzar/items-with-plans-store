<?php

namespace App\Http\Controllers\Client\Order;

use App\Http\Controllers\Controller;

class ShowOrderSuccessController extends Controller
{
    public function __invoke()
    {
        return view('tickets.success');
    }
}