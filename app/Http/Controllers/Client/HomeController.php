<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Core\Ticket\TicketService;

class HomeController extends Controller
{
    private TicketService $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function __invoke()
    {
        $closestTickets = $this->ticketService->closestFive();

        return view('home')
            ->with('tickets', $closestTickets);
    }
}
