<?php

namespace App\Http\Controllers\ResetPassword;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowResetPasswordFormController extends Controller
{
    public function __invoke(string $token)
    {
        try {
            return view('auth.reset-password', ['token' => $token]);
        } catch (Throwable $e) {
            Log::error('failed to show reset password form', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}