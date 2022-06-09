<?php

namespace App\Services\Core\Order;

use App\Models\Order;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Ticket\TicketRepository;
use App\Repositories\TicketPlan\TicketPlanRepository;
use App\Repositories\User\UserRepository;

class OrderService
{
    public function __construct(
        private OrderRepository $orderRepository,
        private UserRepository $userRepository,
        private TicketPlanRepository $ticketPlanRepository,
        private TicketRepository $ticketRepository,
    ) {
    }

    public function findById(string $id): ?Order
    {
        $order = $this->orderRepository->findById($id);
        if ( ! $order instanceof Order) {
            return null;
        }

        return $this->hydrate($order);
    }

    public function create(array $attributes): Order
    {
        return $this->orderRepository->create($attributes);
    }

    private function hydrate(Order $order): Order
    {
        $user = $this->userRepository->findById($order->getUserId());
        $order->setUser($user);

        $plan = $this->ticketPlanRepository->findById($order->getTicketPlanId());
        $order->setTicketPlan($plan);

        $ticket = $this->ticketRepository->findById($plan->getTicketId());
        $order->setTicket($ticket);

        return $order;
    }
}
