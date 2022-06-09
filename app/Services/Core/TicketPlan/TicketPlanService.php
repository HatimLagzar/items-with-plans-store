<?php

namespace App\Services\Core\TicketPlan;

use App\Models\TicketPlan;
use App\Repositories\Ticket\TicketRepository;
use App\Repositories\TicketPlan\TicketPlanRepository;

class TicketPlanService
{
    private TicketPlanRepository $ticketPlanRepository;
    private TicketRepository $ticketRepository;

    public function __construct(
        TicketPlanRepository $ticketPlanRepository,
        TicketRepository $ticketRepository
    ) {
        $this->ticketPlanRepository = $ticketPlanRepository;
        $this->ticketRepository     = $ticketRepository;
    }

    public function findById(string $id): ?TicketPlan
    {
        $ticketPlan = $this->ticketPlanRepository->findById($id);
        if ( ! $ticketPlan instanceof TicketPlan) {
            return null;
        }

        return $this->hydrate($ticketPlan);
    }

    public function create(array $attributes): TicketPlan
    {
        return $this->ticketPlanRepository->create($attributes);
    }

    public function update(TicketPlan $ticketPlan, array $attributes): bool
    {
        return $this->ticketPlanRepository->update($ticketPlan->getId(), $attributes);
    }

    public function deleteByTicketId(int $id): bool
    {
        return $this->ticketPlanRepository->deleteByTicketId($id);
    }

    private function hydrate(TicketPlan $ticketPlan): TicketPlan
    {
        $ticket = $this->ticketRepository->findById($ticketPlan->getTicketId());
        $ticketPlan->setTicket($ticket);

        return $ticketPlan;
    }
}
