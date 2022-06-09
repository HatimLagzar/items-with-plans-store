<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const PAYMENT_TYPE_CREDIT_CARD = 1;
    public const PAYMENT_TYPE_BANK_TRANSFER = 2;
    public const PAYMENT_TYPE_POSTEPAY = 3;

    public const TABLE = 'orders';
    public const ID_COLUMN = 'id';
    public const TICKET_PLAN_ID_COLUMN = 'ticket_plan_id';
    public const USER_ID_COLUMN = 'user_id';
    public const PAYMENT_TYPE_COLUMN = 'payment_type';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TICKET_PLAN_ID_COLUMN,
        self::USER_ID_COLUMN,
        self::PAYMENT_TYPE_COLUMN,
    ];

    private ?User $user = null;
    private ?TicketPlan $plan = null;
    private ?Ticket $ticket = null;

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getUserId(): int
    {
        return $this->getAttribute(self::USER_ID_COLUMN);
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTicketPlanId(): int
    {
        return $this->getAttribute(self::TICKET_PLAN_ID_COLUMN);
    }

    public function getTicketPlan(): ?TicketPlan
    {
        return $this->plan;
    }

    public function setTicketPlan(?TicketPlan $plan): self
    {
        $this->plan = $plan;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(?Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }
}
