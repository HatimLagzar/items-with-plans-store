<?php

namespace App\Services\Core\Ticket;

use App\Models\Ticket;
use App\Repositories\Ticket\TicketRepository;

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
        return $this->ticketRepository->create($attributes);
    }
}
