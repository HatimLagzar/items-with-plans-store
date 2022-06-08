<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\CreateTicketRequest;
use App\Services\Core\Ticket\TicketService;
use App\Services\Domain\TicketPlan\CreateTicketPlansService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class StoreController extends Controller
{
    private TicketService $ticketService;
    private CreateTicketPlansService $createTicketPlansService;

    public function __construct(TicketService $ticketService, CreateTicketPlansService $createTicketPlansService)
    {
        $this->ticketService            = $ticketService;
        $this->createTicketPlansService = $createTicketPlansService;
    }

    public function __invoke(CreateTicketRequest $request): RedirectResponse
    {
        try {
            $ticket = $this->ticketService->create($request->validated());

            $plans = $request->get('ticket_plans');
            $this->createTicketPlansService->create($ticket, $plans);

            return redirect()
                ->route('admin.tickets.index')
                ->with('success', 'Ticket created successfully.');
        } catch (Throwable $e) {
            Log::error('failed to create ticket', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->route('admin.tickets.index')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}
