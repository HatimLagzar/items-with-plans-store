<?php

namespace App\Http\Controllers\Client\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Services\Core\Ticket\TicketService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowTicketController extends Controller
{
    private TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function __invoke(int $id)
    {
        try {
            $ticket = $this->ticketService->findById($id);
            if ( ! $ticket instanceof Ticket) {
                return redirect()
                    ->route('home')
                    ->with('success', __('Ticket was not found!'));
            }

            return view('tickets.show')
                ->with('ticket', $ticket);
        } catch (Throwable $e) {
            Log::error('failed to show ticket page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
