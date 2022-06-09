<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendInvoiceOrdersController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function __invoke(int $id)
    {
        try {
            $order = $this->orderService->findById($id);

            return view('admin.orders.send-invoice')
                ->with('order', $order);
        } catch (Throwable $e) {
            Log::error('failed to show send invoice form', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.orders.index')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}