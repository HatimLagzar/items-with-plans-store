<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\TicketPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TicketPlan>
 */
class TicketPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            TicketPlan::TICKET_ID_COLUMN => Ticket::factory(),
            TicketPlan::NAME_COLUMN      => $this->faker->name,
            TicketPlan::PRICE_COLUMN     => $this->faker->numberBetween(30, 120) * 100, // Cent
            TicketPlan::STOCK_COLUMN     => $this->faker->numberBetween(50, 220),
        ];
    }
}
