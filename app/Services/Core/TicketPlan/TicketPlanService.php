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

    public function update(TicketPlan $ticketPlan, array $attributes): bool
    {
        return $this->ticketPlanRepository->update($ticketPlan->getId(), $attributes);
    }

    public function deleteByTicketId(int $id): bool
    {
        return $this->ticketPlanRepository->deleteByTicketId($id);
    }
}
