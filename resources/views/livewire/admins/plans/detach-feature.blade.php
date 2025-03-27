<?php

use App\Models\Plan;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Plan $plan;
    public $featureId;
    #[On('detachFeature')]
    public function detachFeature($id): void
    {
        $this->featureId = $id;
        Flux::modal('detach-feature')->show();
    }

    public function submit(): void
    {
        $this->plan->features()->detach($this->featureId);
        Flux::modal('detach-feature')->close();
        $this->dispatch('refreshFeatures');
    }
}; ?>

<div>
    <form wire:submit="submit">
        <flux:modal name="detach-feature" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Detacher le feature?</flux:heading>

                    <flux:subheading>
                        <p>You're about to delete this project.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:modal.close>
                        <flux:button variant="ghost">{{ __('Annuler') }}</flux:button>
                    </flux:modal.close>

                    <flux:button type="submit" variant="danger" wire:click="submit">{{ __('Detacher') }}</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>
</div>