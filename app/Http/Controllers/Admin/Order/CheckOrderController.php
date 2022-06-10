<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Log;
use Throwable;

class CheckOrderController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function __invoke(string $secretKey)
    {
        try {
            $order = $this->orderService->findBySecretKey($secretKey);
            if ( ! $order instanceof Order) {
                return view('admin.orders.not-legit');
            }

            return view('admin.orders.legit')
                ->with('order', $order);
        } catch (Throwable $e) {
            Log::error('failed to check order legibility', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}