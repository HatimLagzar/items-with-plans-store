<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            User::EMAIL_COLUMN     => 'admin@admin.com',
            User::USER_TYPE_COLUMN => User::ADMIN_TYPE,
        ]);

        User::factory()->count(50)->create();
    }
}
