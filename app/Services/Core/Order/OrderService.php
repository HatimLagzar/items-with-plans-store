<?php

namespace App\Services\Core\Order;

use App\Models\Order;
use App\Repositories\Order\OrderRepository;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function findById(string $id): ?Order
    {
        return $this->orderRepository->findById($id);
    }

    public function create(array $attributes): Order
    {
        return $this->orderRepository->create($attributes);
    }
}
