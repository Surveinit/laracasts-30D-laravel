<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobListing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Sagar',
            'last_name' => 'Surve',
            'email' => 'sagar@surv3e.com',
        ]);

        JobListing::factory(200)->create();
    }
}
