<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\TicketPlan;
use Illuminate\Database\Seeder;

class TicketPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 5; $i++) {
            $ticket = Ticket::factory()->create();

            TicketPlan::factory()
                      ->count(4)
                      ->create([
                          TicketPlan::TICKET_ID_COLUMN => $ticket->getId()
                      ]);
        }
    }
}
