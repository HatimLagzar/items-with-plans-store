<?php

namespace App\Services\Core\Ticket;

use App\Models\Ticket;
use App\Repositories\Ticket\TicketRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class TicketService
{
    private TicketRepository $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function findById(string $id): ?Ticket
    {
        return $this->ticketRepository->findById($id);
    }

    public function create(array $attributes): Ticket
    {
        $attributes = Arr::only($attributes, [
            Ticket::TITLE_COLUMN,
            Ticket::CITY_COLUMN,
            Ticket::LOCATION_COLUMN,
            Ticket::DATE_AND_TIME_COLUMN,
        ]);

        return $this->ticketRepository->create($attributes);
    }

    /**
     * @return Collection|Ticket[]
     */
    public function getAll(): Collection|array
    {
        return $this->ticketRepository->getAll();
    }
}
