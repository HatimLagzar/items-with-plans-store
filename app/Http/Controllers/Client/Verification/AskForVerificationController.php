<?php

namespace App\Http\Controllers\Client\Verification;

use App\Http\Controllers\Controller;

class AskForVerificationController extends Controller
{
    public function __invoke()
    {
        return view('verification.ask');
    }
}
