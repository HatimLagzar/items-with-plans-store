<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Core\Order\OrderService;
use App\Services\Domain\Order\MarkOrderAsPaidService;
use Illuminate\Support\Facades\Log;
use Throwable;

class MarkOrderAsPaidController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private MarkOrderAsPaidService $markOrderAsPaidService
    ) {
    }

    public function __invoke(int $id)
    {
        try {
            $order = $this->orderService->findById($id);
            if ( ! $order instanceof Order) {
                return redirect()
                    ->back()
                    ->with('error', 'Error occurred, please retry later!');
            }
            $this->markOrderAsPaidService->markAsPaid($order);

            return redirect()
                ->route('admin.orders.index')
                ->with('success', 'Order marked as paid and the QR Code was sent to the client.');
        } catch (Throwable $e) {
            Log::error('failed to mark order as paid', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('admin.orders.index')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}