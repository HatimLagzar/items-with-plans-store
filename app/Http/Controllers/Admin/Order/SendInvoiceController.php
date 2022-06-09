<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\SendInvoiceRequest;
use App\Mail\OrderInvoiceMail;
use App\Models\Order;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendInvoiceController extends Controller
{
    public function __construct(private OrderService $orderService)
    {
    }

    public function __invoke(SendInvoiceRequest $request, int $id)
    {
        try {
            $order = $this->orderService->findById($id);
            if ( ! $order instanceof Order) {
                return redirect()
                    ->back()
                    ->with('error', 'Order not found!');
            }

            $this->orderService->update($order->getId(), [
                Order::INVOICE_URL_COLUMN => $request->get('invoice_url')
            ]);

            $order = $this->orderService->findById($order->getId());

            Mail::to($order->getUser())->send(new OrderInvoiceMail($order));

            return redirect()
                ->route('admin.orders.index')
                ->with('success', 'Invoice sent successfully.');
        } catch (Throwable $e) {
            Log::error('failed to send invoice', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}