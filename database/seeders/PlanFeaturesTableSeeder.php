<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlanFeature;

class PlanFeaturesTableSeeder extends Seeder
{
    public function run(): void
    {
        PlanFeature::create(['plan_id' => 1, 'name' => 'max_users', 'value' => '10']);
        PlanFeature::create(['plan_id' => 2, 'name' => 'max_users', 'value' => '50']);
        PlanFeature::create(['plan_id' => 3, 'name' => 'max_users', 'value' => '1000']);
    }
}