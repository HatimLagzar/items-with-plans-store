<?php

namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;

class TicketRepository extends AbstractEloquentRepository
{
    public function findById(string $id): ?Ticket
    {
        return $this->getQueryBuilder()
                    ->where(Ticket::ID_COLUMN, $id)
                    ->first();
    }

    public function create(array $attributes): Ticket
    {
        return $this->getQueryBuilder()
                    ->create($attributes);
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getAll(): Collection|array
    {
        return $this->getQueryBuilder()
                    ->latest()
                    ->get();
    }

    protected function getModelClass(): string
    {
        return Ticket::class;
    }
}
