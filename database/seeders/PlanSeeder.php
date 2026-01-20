<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::query()->delete();

        Plan::create([
            'name' => 'Basic',
            'slug' => 'basic',
            'description' => 'Basic plan with limited features.',
            'price' => 0.00,
            'pdf_limit' => 10,
            'is_active' => true,
            'features' => json_encode([
                '10 PDF per month',
                'Standard summaries',
                'Email support',
                'Basic Export Options'
            ]),
        ]);

        Plan::create([
            'name' => 'Standard',
            'slug' => 'standard',
            'description' => 'Best for regular users.',
            'price' => 9.99,
            'pdf_limit' => 50,
            'is_active' => true,
            'features' => json_encode([
                '50 PDF per month',
                'All summaries',
                'Priority support',
                'Many Export Options',
                'Advanced Analytics options'
            ]),
        ]);

        Plan::create([
            'name' => 'Premium',
            'slug' => 'premium',
            'description' => 'For Power Users.',
            'price' => 29.99,
            'pdf_limit' => -1,
            'is_active' => true,
            'features' => json_encode([
                'Unlimited PDF',
                'All summaries types',
                'API Access',
                'Priority support',
                'Many Export Options',
                'Custom Integrations',
                'Advanced Analytics options'
            ]),

        ]);
    }
}
