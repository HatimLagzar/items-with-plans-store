<?php

namespace App\Http\Controllers\Client\Order;

use App\DTO\Phone\Exception\InvalidPhoneException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderRequest;
use App\Models\TicketPlan;
use App\Services\Core\TicketPlan\TicketPlanService;
use App\Services\Domain\Order\CreateOrderService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Throwable;

class OrderController extends Controller
{
    private CreateOrderService $createOrderService;
    private TicketPlanService $ticketPlanService;

    public function __construct(
        CreateOrderService $createOrderService,
        TicketPlanService $ticketPlanService
    ) {
        $this->createOrderService = $createOrderService;
        $this->ticketPlanService  = $ticketPlanService;
    }

    public function __invoke(OrderRequest $request, int $id): RedirectResponse
    {
        try {
            $ticketPlan = $this->ticketPlanService->findById($id);
            if ( ! $ticketPlan instanceof TicketPlan) {
                return redirect()
                    ->back()
                    ->with('error', __('Ticket type was not found!'));
            }

            $this->createOrderService->create($ticketPlan, $request->validated());

            return redirect()
                ->route('tickets.success');
        } catch (InvalidPhoneException $e) {
            return redirect()
                ->back()
                ->with('error', __('Invalid phone number!'));
        } catch (Throwable $e) {
            Log::error('failed to order ticket', [
                'error_message' => $e->getMessage(),
                'error_trace'   => $e->getTraceAsString()
            ]);

            return redirect()
                ->back()
                ->with('error', __('Error occurred, please retry later!'));
        }
    }
}
