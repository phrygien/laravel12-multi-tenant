<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Module;
use Illuminate\Support\Str;

class ModulesTableSeeder extends Seeder
{
    // public function run(): void
    // {
    //     Module::create(['name' => 'dashboard', 'status' => 'active']);
    //     Module::create(['name' => 'reports', 'status' => 'active']);
    //     Module::create(['name' => 'settings', 'status' => 'inactive']);
    // }

    public function run(): void
    {
        $modules = [];

        for ($i = 1; $i <= 100; $i++) {
            $modules[] = [
                'name' => 'Module ' . $i,
                'status' => ['active', 'inactive'][array_rand(['active', 'inactive'])],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('modules')->insert($modules);
    }
}
