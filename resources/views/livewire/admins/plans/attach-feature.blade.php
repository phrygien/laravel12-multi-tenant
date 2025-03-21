<?php

use App\Models\Feature;
use App\Models\Plan;
use Flux\Flux;
use Mary\Traits\Toast;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {

    use Toast;

    public Plan $plan;

    public $features;

    #[Rule('required')]
    public $feature_id;

    #[Rule('required')]
    public $limit;

    public function mount(): void
    {
        // Je veux récupérer la liste des features qui ne sont pas dans le plan
        $featuresCollection = Feature::whereNotIn('features.id', $this->plan->features()->pluck('features.id'))->get();
    
        // Transformer la collection en un tableau avec des attributs comme 'disabled'
        $this->features = $featuresCollection->map(function ($feature) {
            $featureArray = ['id' => $feature->id, 'name' => $feature->name];
            return $featureArray;
        });
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
        $this->success('Feature attaché');
        $this->reset('feature_id', 'limit');
        $this->dispatch('refreshFeatures');

        Flux::modal('attach-feature')->close();
        
    }

    public function with(): array
    {
        return [
            'plan' => $this->plan,
            'features' => $this->features,
        ];
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

                <x-mary-select label="Feature" wire:model="feature_id" :options="$features" />

                <flux:input wire:model.live="limit" label="Valeur" placeholder="" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button wire:click="submit" type="submit" variant="primary">{{ __('Enregistrer') }}</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>
</div>
