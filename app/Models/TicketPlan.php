<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPlan extends Model
{
    use HasFactory;

    public const TABLE = 'ticket_plans';
    public const ID_COLUMN = 'id';
    public const TICKET_ID_COLUMN = 'ticket_id';
    public const NAME_COLUMN = 'name';
    public const PRICE_COLUMN = 'price';
    public const STOCK_COLUMN = 'stock';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TICKET_ID_COLUMN,
        self::NAME_COLUMN,
        self::PRICE_COLUMN,
        self::STOCK_COLUMN,
    ];

    private ?Ticket $ticket = null;

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getName(): string
    {
        return $this->getAttribute(self::NAME_COLUMN);
    }

    public function getTicketId(): int
    {
        return $this->getAttribute(self::TICKET_ID_COLUMN);
    }

    public function getPrice(): int
    {
        return $this->getAttribute(self::PRICE_COLUMN);
    }

    public function getStock(): int
    {
        return $this->getAttribute(self::STOCK_COLUMN);
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
