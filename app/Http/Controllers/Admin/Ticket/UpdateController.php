<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Models\Ticket;
use App\Services\Core\Ticket\TicketService;
use App\Services\Domain\TicketPlan\UpdateTicketPlansService;
use Illuminate\Support\Facades\Log;
use Throwable;

class UpdateController extends Controller
{
    private TicketService $ticketService;
    private UpdateTicketPlansService $updateTicketPlansService;

    public function __construct(TicketService $ticketService, UpdateTicketPlansService $updateTicketPlansService)
    {
        $this->ticketService            = $ticketService;
        $this->updateTicketPlansService = $updateTicketPlansService;
    }

    public function __invoke(UpdateTicketRequest $request, int $id)
    {
        try {
            $ticket = $this->ticketService->findById($id);
            if ( ! $ticket instanceof Ticket) {
                return redirect()
                    ->back()
                    ->with('error', 'Ticket not found!');
            }
            $this->ticketService->update($ticket, $request->validated());
            $plans = $request->get('ticket_plans');
            $this->updateTicketPlansService->update($ticket, $plans);

            return redirect()
                ->route('admin.tickets.index')
                ->with('success', 'Ticket updated successfully');
        } catch (Throwable $e) {
            Log::error('failed to update ticket', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->with('error', 'Error occurred, please retry later.');
        }
    }
}