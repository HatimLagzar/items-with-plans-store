<?php

namespace App\Repositories\TicketPlan;

use App\Models\TicketPlan;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @return Collection|TicketPlan[]
     */
    public function findByTicket(int $ticketId): Collection|array
    {
        return $this->getQueryBuilder()
                    ->where(TicketPlan::TICKET_ID_COLUMN, $ticketId)
                    ->get();
    }

    public function update(int $ticketId, array $attributes): bool
    {
        return $this->getQueryBuilder()
                    ->where(TicketPlan::ID_COLUMN, $ticketId)
                    ->update($attributes) > 0;
    }

    public function deleteByTicketId(int $id): bool
    {
        return $this->getQueryBuilder()
                    ->where(TicketPlan::TICKET_ID_COLUMN, $id)
                    ->delete() > 0;
    }

    protected function getModelClass(): string
    {
        return TicketPlan::class;
    }
}
