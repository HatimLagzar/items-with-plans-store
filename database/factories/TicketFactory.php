<?php

namespace Database\Factories;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            Ticket::TITLE_COLUMN         => $this->faker->name,
            Ticket::CITY_COLUMN          => $this->faker->city,
            Ticket::LOCATION_COLUMN      => $this->faker->streetAddress,
            Ticket::DATE_AND_TIME_COLUMN => $this->faker->dateTime,
        ];
    }
}
