<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const TABLE = 'orders';
    public const ID_COLUMN = 'id';
    public const TICKET_PLAN_ID_COLUMN = 'ticket_plan_id';
    public const USER_ID_COLUMN = 'user_id';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TICKET_PLAN_ID_COLUMN,
        self::USER_ID_COLUMN,
    ];
}
