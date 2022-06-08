<?php

namespace App\Services\Domain\TicketPlan;

use App\Models\Ticket;
use App\Models\TicketPlan;
use App\Services\Core\TicketPlan\TicketPlanService;

class CreateTicketPlansService
{
    private TicketPlanService $ticketPlanService;

    public function __construct(TicketPlanService $ticketPlanService)
    {
        $this->ticketPlanService = $ticketPlanService;
    }

    public function create(Ticket $ticket, $plans): bool
    {
        foreach ($plans as $plan) {
            $plan[TicketPlan::TICKET_ID_COLUMN] = $ticket->getId();
            $plan[TicketPlan::PRICE_COLUMN]     = $plan[TicketPlan::PRICE_COLUMN] * 100;

            $this->ticketPlanService->create($plan);
        }

        return true;
    }
}