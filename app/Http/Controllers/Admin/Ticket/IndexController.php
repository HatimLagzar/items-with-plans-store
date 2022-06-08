<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Services\Core\Ticket\TicketService;
use Illuminate\Support\Facades\Log;
use Throwable;

class IndexController extends Controller
{
    private TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function __invoke()
    {
        try {
            $tickets = $this->ticketService->getAll();

            return view('admin.tickets.index')
                ->with('tickets', $tickets);
        } catch (Throwable $e) {
            Log::error('failed to show tickets index page', [
                'error_message' => $e->getMessage(),
            ]);

            return 'Error occurred, please retry later.';
        }
    }
}
