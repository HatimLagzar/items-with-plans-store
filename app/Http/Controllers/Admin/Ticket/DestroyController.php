<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Core\Ticket\TicketService;
use App\Services\Core\TicketPlan\TicketPlanService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class DestroyController extends Controller
{
    private TicketService $ticketService;
    private TicketPlanService $ticketPlanService;

    public function __construct(TicketService $ticketService, TicketPlanService $ticketPlanService)
    {
        $this->ticketService     = $ticketService;
        $this->ticketPlanService = $ticketPlanService;
    }

    public function __invoke(int $id): RedirectResponse
    {
        try {
            $this->ticketService->deleteById($id);
            $this->ticketPlanService->deleteByTicketId($id);

            return redirect()
                ->route('admin.tickets.index')
                ->with('success', 'Ticket deleted successfully');
        } catch (Throwable $e) {
            Log::error('failed to delete ticket', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('admin.tickets.index')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}