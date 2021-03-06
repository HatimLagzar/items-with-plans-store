<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
    public const CREATED_AT_COLUMN = 'created_at';

    protected $table = self::TABLE;
    protected $fillable = [
        self::TITLE_COLUMN,
        self::CITY_COLUMN,
        self::LOCATION_COLUMN,
        self::DATE_AND_TIME_COLUMN,
    ];

    protected $casts = [
        self::DATE_AND_TIME_COLUMN => 'datetime',
        self::CREATED_AT_COLUMN    => 'datetime'
    ];
    /**
     * @var TicketPlan[]|Collection|null
     */
    private null|array|Collection $plans = null;

    public function getId(): int
    {
        return $this->getAttribute(self::ID_COLUMN);
    }

    public function getTitle(): string
    {
        return $this->getAttribute(self::TITLE_COLUMN);
    }

    public function getCity(): string
    {
        return $this->getAttribute(self::CITY_COLUMN);
    }

    public function getLocation(): string
    {
        return $this->getAttribute(self::LOCATION_COLUMN);
    }

    public function getDateAndTime(): Carbon
    {
        return $this->getAttribute(self::DATE_AND_TIME_COLUMN);
    }

    public function getCreatedAt(): Carbon
    {
        return $this->getAttribute(self::CREATED_AT_COLUMN);
    }

    /**
     * @return  Collection|TicketPlan[]
     */
    public function getPlans(): Collection|array
    {
        return $this->plans;
    }

    /**
     * @param  Collection|TicketPlan[]  $plans
     */
    public function setPlans(Collection|array $plans): self
    {
        $this->plans = $plans;

        return $this;
    }
}
