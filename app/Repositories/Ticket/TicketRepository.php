<?php

namespace App\Repositories\Ticket;

use App\Models\Ticket;
use App\Repositories\AbstractEloquentRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public function update(int $id, array $attributes): bool
    {
        return $this->getQueryBuilder()
                    ->where(Ticket::ID_COLUMN, $id)
                    ->update($attributes) > 0;
    }

    public function deleteById(int $id): bool
    {
        return $this->getQueryBuilder()
                    ->where(Ticket::ID_COLUMN, $id)
                    ->delete() > 0;
    }

    /**
     * @return Collection|Ticket[]
     */
    public function closestFive(): Collection|array
    {
        return $this->getQueryBuilder()
                    ->orderBy(DB::raw(sprintf('ABS(DATEDIFF(%s.%s, NOW()))', Ticket::TABLE, Ticket::DATE_AND_TIME_COLUMN)))
                    ->limit(5)
                    ->get();
    }

    protected function getModelClass(): string
    {
        return Ticket::class;
    }
}
