<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\AbstractEloquentRepository;

class OrderRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?Order
    {
        return $this->getQueryBuilder()
                    ->where(Order::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): Order
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    protected function getModelClass(): string
    {
        return Order::class;
    }
}
