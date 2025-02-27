<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionsTableSeeder extends Seeder
{
    public function run(): void
    {
        Subscription::create([
            'user_id' => 1,
            'plan_id' => 1,
            'tenant_id' => 'tenant_123',
            'start_date' => Carbon::now(),
            'status' => 'active',
        ]);
    }
}