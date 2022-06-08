<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Core\Ticket\TicketService;
use Illuminate\Support\Facades\Log;
use Throwable;

class EditController extends Controller
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

            return view('admin.tickets.edit')
                ->with('ticket', $ticket);
        } catch (Throwable $e) {
            Log::error('failed to show edit ticket page', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.tickets.index')
                ->with('error', 'Error occurred, please retry later');
        }
    }
}