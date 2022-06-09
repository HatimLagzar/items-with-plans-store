<?php

namespace App\Http\Controllers\Client\Ticket;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowUserTicketsController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function __invoke()
    {
        try {
            /** @var User $user */
            $user   = auth()->guard('web')->user();
            $orders = $this->orderService->getAllByUser($user);

            return view('tickets.index')
                ->with('orders', $orders);
        } catch (Throwable $e) {
            Log::error('failed to show user tickets', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
