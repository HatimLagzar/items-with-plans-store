<?php

namespace App\Repositories\TicketPlan;

use App\Models\TicketPlan;
use App\Repositories\AbstractEloquentRepository;

class TicketPlanRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?TicketPlan
    {
        return $this->getQueryBuilder()
                    ->where(TicketPlan::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): TicketPlan
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    protected function getModelClass(): string
    {
        return TicketPlan::class;
    }
}
