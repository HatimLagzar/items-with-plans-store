<?php

namespace App\Http\Controllers\Client\Login;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowLoginPageController extends Controller
{
    public function __invoke()
    {
        try {
            return view('auth.login');
        } catch (Throwable $e) {
            Log::error('failed to show login page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
