<?php

namespace App\Http\Controllers\Client\TicketPlan;

use App\Http\Controllers\Controller;
use App\Models\TicketPlan;
use App\Services\Core\TicketPlan\TicketPlanService;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShowController extends Controller
{
    private TicketPlanService $ticketPlanService;

    public function __construct(TicketPlanService $ticketPlanService)
    {
        $this->ticketPlanService = $ticketPlanService;
    }

    public function __invoke(int $id)
    {
        try {
            $plan = $this->ticketPlanService->findById($id);
            if ( ! $plan instanceof TicketPlan) {
                return redirect()
                    ->route('home')
                    ->with('error', __('Ticket plan was not found!'));
            }

            return view('tickets.order')
                ->with('plan', $plan);
        } catch (Throwable $e) {
            Log::error('failed to show order page', [
                'error_message' => $e->getMessage()
            ]);

            return redirect()
                ->route('home')
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
