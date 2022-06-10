<?php

namespace App\Services\Domain\Order;

use App\Models\Order;
use App\Services\Core\Order\OrderService;

class CheckInService
{
    public const NOT_LEGIT = 1;
    public const LEGIT = 2;
    public const LEGIT_ALREADY_CHECKED_IN = 3;

    public function __construct(private OrderService $orderService)
    {
    }

    public function checkIn(string $secretKey): int
    {
        $order = $this->orderService->findBySecretKey($secretKey);
        if ( ! $order instanceof Order) {
            return self::NOT_LEGIT;
        }

        if ($order->hasCheckedIn()) {
            return self::LEGIT_ALREADY_CHECKED_IN;
        }

        $this->orderService->update($order->getId(), [
            Order::HAS_CHECKED_IN_COLUMN => true
        ]);

        return self::LEGIT;
    }
}