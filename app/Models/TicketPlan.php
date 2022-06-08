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
}
