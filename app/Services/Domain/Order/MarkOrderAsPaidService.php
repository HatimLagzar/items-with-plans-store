<?php

namespace App\Services\Domain\Order;

use App\Mail\OrderPaidMail;
use App\Models\Order;
use App\Services\Core\Order\OrderService;
use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS2D;

class MarkOrderAsPaidService
{
    public function __construct(private DNS2D $DNS2D, private OrderService $orderService)
    {
    }

    public function markAsPaid(Order $order): bool
    {
        $this->orderService->update($order->getId(), [
            Order::IS_PAID_COLUMN => true
        ]);

        $qrCode = $this->DNS2D->getBarcodeSVG(
            route('admin.orders.check', ['secretKey' => $order->getSecretKey()]),
            'QRCODE'
        );

        Mail::to($order->getUser())->send(new OrderPaidMail($order, $qrCode));

        return true;
    }
}