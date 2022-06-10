<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Services\Core\Order\OrderService;
use App\Services\Domain\Order\CheckInService;
use Illuminate\Support\Facades\Log;
use Throwable;

class CheckOrderController extends Controller
{
    public function __construct(
        private OrderService $orderService,
        private CheckInService $checkInService
    ) {
    }

    public function __invoke(string $secretKey)
    {
        try {
            $order  = $this->orderService->findBySecretKey($secretKey);
            $result = $this->checkInService->checkIn($secretKey);

            if ($result === CheckInService::LEGIT) {
                return view('admin.orders.legit')
                    ->with('order', $order);
            }

            if ($result === CheckInService::NOT_LEGIT) {
                return view('admin.orders.not-legit');
            }

            if ($result === CheckInService::LEGIT_ALREADY_CHECKED_IN) {
                return view('admin.orders.legit-checked-in')
                    ->with('order', $order);
            }
        } catch (Throwable $e) {
            Log::error('failed to check order legibility', [
                'error_message' => $e->getMessage(),
            ]);

            return redirect()
                ->route('admin.home')
                ->with('error', 'Error occurred, please retry later!');
        }
    }
}