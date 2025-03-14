<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            ['name' => 'max_users', 'description' => 'Nombre maximum d\'utilisateurs'],
            ['name' => 'max_students', 'description' => 'Nombre maximum d\'élèves'],
            ['name' => 'max_teachers', 'description' => 'Nombre maximum d\'enseignants'],
            ['name' => 'storage_limit', 'description' => 'Espace de stockage en Mo'],
        ];

        foreach ($features as $feature) {
            Feature::firstOrCreate(['name' => $feature['name']], $feature);
        }
    }
}
