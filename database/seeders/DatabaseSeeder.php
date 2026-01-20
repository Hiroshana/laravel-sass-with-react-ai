<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;
use Database\Seeders\PlanSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(PlanSeeder::class);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@samath.com.au',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $basicPlan = Plan::where('slug', 'basic')->first();

        User::create([
            'name' => 'Test User',
            'email' => 'hiro@samath.com.au',
            'password' => bcrypt('password'),
            'role' => 'user',
            'plan_id' => $basicPlan->id,
            'pdf_count' => 2,
            'pdf_count_reset_at' => now()->addMonth(),
        ]);
    }
}
