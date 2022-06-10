<?php

namespace App\Services\Domain\Order;

use App\Mail\OrderCreatedMail;
use App\Models\Order;
use App\Models\TicketPlan;
use App\Models\User;
use App\Services\Core\Order\OrderService;
use App\Services\Core\User\UserService;
use App\Services\Domain\Auth\RegisterService;
use Illuminate\Support\Facades\Mail;

class CreateOrderService
{
    private OrderService $orderService;
    private UserService $userService;
    private RegisterService $registerService;

    public function __construct(
        OrderService $orderService,
        UserService $userService,
        RegisterService $registerService
    ) {
        $this->orderService    = $orderService;
        $this->userService     = $userService;
        $this->registerService = $registerService;
    }

    public function create(TicketPlan $ticketPlan, array $attributes): Order
    {
        $email = $attributes[User::EMAIL_COLUMN];
        $user  = auth()->guard('web')->user() ?? $this->userService->findByEmail($email);
        if ( ! $user instanceof User) {
            $user = $this->registerService->register(
                $attributes[User::FIRST_NAME_COLUMN],
                $attributes[User::LAST_NAME_COLUMN],
                $attributes[User::EMAIL_COLUMN],
                $attributes[User::PHONE_COLUMN],
            );
        }

        $order = $this->orderService->create([
            Order::TICKET_PLAN_ID_COLUMN => $ticketPlan->getId(),
            Order::USER_ID_COLUMN        => $user->getId(),
            Order::PAYMENT_TYPE_COLUMN   => $attributes[Order::PAYMENT_TYPE_COLUMN],
        ]);

        $order = $this->orderService->findById($order->getId());

        Mail::to($user)->queue(new OrderCreatedMail($order, $user, $ticketPlan->getTicket(), $ticketPlan));

        return $order;
    }
}