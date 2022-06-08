<?php

namespace App\Services\Core\TicketPlan;

use App\Models\TicketPlan;
use App\Repositories\TicketPlan\TicketPlanRepository;

class TicketPlanService
{
    private TicketPlanRepository $ticketPlanRepository;

    public function __construct(TicketPlanRepository $ticketPlanRepository)
    {
        $this->ticketPlanRepository = $ticketPlanRepository;
    }

    public function findById(string $id): ?TicketPlan
    {
        return $this->ticketPlanRepository->findById($id);
    }

    public function create(array $attributes): TicketPlan
    {
        return $this->ticketPlanRepository->create($attributes);
    }
}
