<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanModuleTableSeeder extends Seeder
{
    public function run(): void
    {
        // Associer les modules aux plans
        DB::table('plan_modules')->insert([
            ['plan_id' => 1, 'module_id' => 1], // Basic → Dashboard
            ['plan_id' => 1, 'module_id' => 2], // Basic → Reports
            ['plan_id' => 2, 'module_id' => 1], // Pro → Dashboard
            ['plan_id' => 2, 'module_id' => 2], // Pro → Reports
            ['plan_id' => 2, 'module_id' => 3], // Pro → Settings
            ['plan_id' => 3, 'module_id' => 1], // Enterprise → Dashboard
            ['plan_id' => 3, 'module_id' => 2], // Enterprise → Reports
            ['plan_id' => 3, 'module_id' => 3], // Enterprise → Settings
        ]);
    }
}