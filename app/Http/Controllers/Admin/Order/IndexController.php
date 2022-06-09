<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Log;
use Throwable;

class IndexController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function __invoke()
    {
        try {
            $orders = $this->orderService->getAll();

            return view('admin.orders.index')
                ->with('orders', $orders);
        } catch (Throwable $e) {
            Log::error('failed to list orders', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}