<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;
use App\Models\Feature;

class FeaturePlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = Plan::all();

        foreach ($plans as $plan) {
            $features = Feature::all();

            foreach ($features as $feature) {
                $limit = match ($feature->name) {
                    'max_users' => $plan->name === 'Premium' ? 100 : 50,
                    'max_students' => $plan->name === 'Premium' ? 500 : 200,
                    'max_teachers' => $plan->name === 'Premium' ? 50 : 20,
                    'storage_limit' => $plan->name === 'Premium' ? 5000 : 2000, // en Mo
                    default => null,
                };

                $plan->features()->attach($feature->id, ['limit' => $limit]);
            }
        }
    }
}
