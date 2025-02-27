<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesTableSeeder extends Seeder
{
    public function run(): void
    {
        Module::create(['name' => 'dashboard', 'status' => 'active']);
        Module::create(['name' => 'reports', 'status' => 'active']);
        Module::create(['name' => 'settings', 'status' => 'inactive']);
    }
}