<?php

use App\Models\Feature;
use App\Models\Plan;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public Plan $plan;

    public $features = [];

    #[Rule('required')]
    public $feature_id;

    #[Rule('required')]
    public $limit;

    public function mount(): void
    {
        // je veux recupeer le liste des features qui ne sont pas dans le plan
        $featuresCollection = Feature::whereNotIn('features.id', $this->plan->features()->pluck('features.id'))->get();
        $this->features = $featuresCollection->pluck('name', 'id')->toArray();
    }

    #[On('attachFeature')]
    public function attachFeature($id): void
    {
        // Ouvrir la modal d'attachement de module
        Flux::modal('attach-feature')->show();
    }

    public function submit()
    {
        $this->validate();
        $plan = Plan::find($this->plan->id);
        $plan->features()->syncWithoutDetaching([$this->feature_id => ['limit' => $this->limit]]);
        Flux::modal('attach-feature')->close();
        
    }
}; ?>

<div>
    <form wire:submit="submit">
        <flux:modal name="attach-feature" class="md:w-full">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ __('Configurer le feature') }}</flux:heading>
                    <flux:subheading>{{ __('Limitez les fonctionnalités de votre plan') }}</flux:subheading>
                </div>

                <flux:select wire:model.live="feature_id" placeholder="Choose industry..." label="Feature">
                <flux:select.option></flux:select.option>
                    @foreach ($features as $key => $value)
                        <flux:select.option value="{{ $key }}">{{ $value }}</flux:select.option>
                    @endforeach
                </flux:select>

                <flux:input wire:model.live="limit" label="Valeur" placeholder="" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button wire:click="submit" type="submit" variant="primary">{{ __('Enregistrer') }}</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>
</div>
