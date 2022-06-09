<?php

namespace App\Services\Core\Order;

use App\Models\Order;
use App\Models\User;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Ticket\TicketRepository;
use App\Repositories\TicketPlan\TicketPlanRepository;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Collection;

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
        $order = $this->hydrateWithUser($order);

        return $this->hydrateWithTicketPlanAndTicket($order);
    }

    /**
     * @return Order[]|Collection
     */
    public function getAll(): Collection|array
    {
        return $this->orderRepository->getAll()->transform(function (Order $order) {
            return $this->hydrate($order);
        });
    }

    public function hydrateWithUser(Order $order): Order
    {
        $user = $this->userRepository->findById($order->getUserId());
        $order->setUser($user);

        return $order;
    }

    public function hydrateWithTicketPlanAndTicket(Order $order): Order
    {
        $ticketPlan = $this->ticketPlanRepository->findById($order->getTicketPlanId());
        $order->setTicketPlan($ticketPlan);

        $ticket = $this->ticketRepository->findById($ticketPlan->getTicketId());
        $order->setTicket($ticket);

        return $order;
    }

    public function update(int $id, array $attributes): bool
    {
        return $this->orderRepository->update($id, $attributes);
    }

    /**
     * @param  User  $user
     *
     * @return Order[]|Collection
     */
    public function getAllByUser(User $user): Collection|array
    {
        return $this->orderRepository->getAllByUser($user->getId())
                                     ->transform(function (Order $order) {
                                         return $this->hydrateWithTicketPlanAndTicket($order);
                                     });
    }
}
