<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public const TABLE = 'tickets';
    public const ID_COLUMN = 'id';
    public const TITLE_COLUMN = 'title';
    public const CITY_COLUMN = 'city';
    public const LOCATION_COLUMN = 'location';
    public const DATE_AND_TIME_COLUMN = 'date_and_time';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TITLE_COLUMN,
        self::CITY_COLUMN,
        self::LOCATION_COLUMN,
        self::DATE_AND_TIME_COLUMN,
    ];

    protected $casts = [
        self::DATE_AND_TIME_COLUMN => 'datetime'
    ];

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }
}
