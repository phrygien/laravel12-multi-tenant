<?php

use App\Models\Plan;
use Livewire\Volt\Component;

new class extends Component {
    public Plan $plan;

    public function mount(Plan $plan) {
        $this->plan = $plan;
    }
}; ?>

<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Subscribe Plan') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('You are about to subscribe to') }} {{ $plan->name }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
</div>
