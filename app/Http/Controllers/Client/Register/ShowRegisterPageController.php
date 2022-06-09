<?php

namespace App\Http\Controllers\Client\Register;

use App\Http\Controllers\Controller;
use App\Services\Core\Country\CountryService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowRegisterPageController extends Controller
{
    public function __invoke()
    {
        try {
            return view('auth.register');
        } catch (Throwable $e) {
            Log::error('failed to show register page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
