<?php

namespace App\Http\Controllers\Client\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class LogoutController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        try {
            auth()->logout();

            return redirect()
                ->route('home');
        } catch (Throwable $e) {
            Log::error('failed to logout', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
