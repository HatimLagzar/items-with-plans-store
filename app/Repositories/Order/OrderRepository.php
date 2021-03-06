<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @return Collection|Order[]
     */
    public function getAll(): Collection|array
    {
        return $this->getQueryBuilder()
                    ->latest()
                    ->get();
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->getQueryBuilder()
                    ->where(Order::ID_COLUMN, $id)
                    ->update($attributes) > 0;
    }

    /**
     * @return Collection|Order[]
     */
    public function getAllByUser(int $userId): Collection|array
    {
        return $this->getQueryBuilder()
                    ->where(Order::USER_ID_COLUMN, $userId)
                    ->latest()
                    ->get();
    }

    public function findBySecretKey(string $secretKey): ?Order
    {
        return $this->getQueryBuilder()
                    ->where(Order::SECRET_KEY_COLUMN, $secretKey)
                    ->first();
    }

    protected function getModelClass(): string
    {
        return Order::class;
    }
}
