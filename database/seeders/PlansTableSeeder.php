<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    public function run(): void
    {
        Plan::create(['name' => 'Basic', 'price' => 10, 'have_trial' => true]);
        Plan::create(['name' => 'Pro', 'price' => 20, 'have_trial' => false]);
        Plan::create(['name' => 'Enterprise', 'price' => 50, 'have_trial' => false]);
    }
}