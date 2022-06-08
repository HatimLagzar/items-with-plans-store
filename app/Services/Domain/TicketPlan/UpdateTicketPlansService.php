<?php

namespace App\Services\Domain\TicketPlan;

use App\Models\Ticket;
use App\Models\TicketPlan;
use App\Services\Core\TicketPlan\TicketPlanService;

class UpdateTicketPlansService
{
    private TicketPlanService $ticketPlanService;

    public function __construct(TicketPlanService $ticketPlanService)
    {
        $this->ticketPlanService = $ticketPlanService;
    }

    public function update(Ticket $ticket, array $plans): bool
    {
        foreach ($plans as $plan) {
            $plan[TicketPlan::PRICE_COLUMN]     = $plan[TicketPlan::PRICE_COLUMN] * 100;
            $plan[TicketPlan::TICKET_ID_COLUMN] = $ticket->getId();

            if (isset($plan['id'])) {
                $ticketPlan = $this->ticketPlanService->findById($plan['id']);
                if ($ticketPlan instanceof TicketPlan) {
                    $this->ticketPlanService->update($ticketPlan, $plan);
                    continue;
                }
            }

            $this->ticketPlanService->create($plan);
        }

        return true;
    }
}