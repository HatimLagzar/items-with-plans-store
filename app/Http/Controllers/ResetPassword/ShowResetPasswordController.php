<?php

namespace App\Http\Controllers\ResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowResetPasswordController extends Controller
{
    public function __invoke()
    {
        try {
            return view('auth.forgot-password');
        } catch (Throwable $e) {
            Log::error('failed to show reset password page', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}