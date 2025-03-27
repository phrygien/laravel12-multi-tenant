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
        $featuresCollection = Feature::whereNotIn('features.id', $this->plan->features()->pluck('features.id'))->get();
        $this->features = $featuresCollection->map(function ($feature) {
            $featureArray = ['id' => $feature->id, 'name' => $feature->name];
            return $featureArray;
        });
    }
    
    

    #[On('attachFeature')]
    public function attachFeature($id): void
    {
        Flux::modal('attach-feature')->show();
    }

    public function submit()
    {
        $this->validate();
        $plan = Plan::find($this->plan->id);
        $plan->features()->syncWithoutDetaching([$this->feature_id => ['limit' => $this->limit]]);
        $this->reset('feature_id', 'limit');
        Flux::modal('attach-feature')->show();
        $this->dispatch('refreshFeatures');
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

                <flux:select wire:model.live="feature_id" label="Feature Name">
                    <flux:select.option value="">{{ __('Choose feature...') }}</flux:select.option>
                    @foreach($features as $feature)
                    <flux:select.option value="{{ $feature['id'] }}">{{ $feature['name'] }}</flux:select.option>
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
