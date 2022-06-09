<?php

namespace App\Http\Controllers\Client\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Domain\Auth\LoginService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class LoginController extends Controller
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function __invoke(LoginRequest $request): RedirectResponse
    {
        try {
            $isSuccessful = $this->loginService->login(
                $request->get('email'),
                $request->get('password'),
            );

            if ($isSuccessful === false) {
                return redirect()
                    ->back()
                    ->with('error', __('Incorrect credentials!'));
            }

            return redirect()
                ->route('home')
                ->with('success', __('You did login successfully.'));
        } catch (Throwable $e) {
            Log::error('failed to login', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
