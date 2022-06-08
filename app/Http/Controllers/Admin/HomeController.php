<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Throwable;

class HomeController extends Controller
{
    public function __invoke()
    {
        try {
            return view('admin.home');
        } catch (Throwable $e) {
            Log::error('failed to show home', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->to('/')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
