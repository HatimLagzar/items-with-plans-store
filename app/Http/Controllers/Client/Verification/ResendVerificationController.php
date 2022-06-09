<?php

namespace App\Http\Controllers\Client\Verification;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class ResendVerificationController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        try {
            /** @var User $user */
            $user = auth()->user();

            Mail::to($user)->queue(new EmailVerificationMail($user));

            return redirect()
                ->route('verification.ask')
                ->with('success', __('Verification link was sent successfully!'));
        } catch (Throwable $e) {
            Log::error('failed to resend verification link', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('verification.ask')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
