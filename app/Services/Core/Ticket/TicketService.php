<?php

namespace App\Services\Core\Ticket;

use App\Models\Ticket;
use App\Repositories\Ticket\TicketRepository;
use App\Repositories\TicketPlan\TicketPlanRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

class TicketService
{
    private TicketRepository $ticketRepository;
    private TicketPlanRepository $ticketPlanRepository;

    public function __construct(
        TicketRepository $ticketRepository,
        TicketPlanRepository $ticketPlanRepository
    ) {
        $this->ticketRepository     = $ticketRepository;
        $this->ticketPlanRepository = $ticketPlanRepository;
    }

    public function findById(string $id): ?Ticket
    {
        $ticket = $this->ticketRepository->findById($id);
        if ( ! $ticket instanceof Ticket) {
            return null;
        }

        return $this->hydrate($ticket);
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

    private function hydrate(Ticket $ticket): Ticket
    {
        $plans = $this->ticketPlanRepository->findByTicket($ticket->getId());
        $ticket->setPlans($plans);

        return $ticket;
    }
}
