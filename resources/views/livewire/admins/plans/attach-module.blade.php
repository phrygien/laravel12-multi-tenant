<?php

use App\Models\Module;
use App\Models\Plan;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public Plan $plan;
    public $modules = [];
    public $selectedModules = [];

    public function mount()
    {
        // je veux avoir la liste des modules qui ne sont pas dans le plan
        $modulesCollection = Module::whereNotIn('modules.id', $this->plan->modules()->pluck('modules.id'))->get();
        $this->modules = $modulesCollection->pluck('name', 'id')->toArray();
    }

    #[On('attachModule')]
    public function attachModule($id): void
    {
        // Ouvrir la modal d'attachement de module
        Flux::modal('attach-module')->show();
    }

    public function submit()
    {
        $plan = Plan::find($this->plan->id);
        $plan->modules()->sync($this->selectedModules, false);
        $this->selectedModules = [];
        Flux::modal('attach-module')->close();
        $this->dispatch('refreshModules');
    }

}; ?>

<div>
    <form wire:submit="submit()">
    <flux:modal name="attach-module" class="md:w-full md:height-auto">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Attacher un module au plan') }}</flux:heading>
                <flux:subheading>Make changes to your personal details.</flux:subheading>
            </div>
        
            <x-tom
                wire:model="selectedModules"
                id="selectedModules"
                multiple
                class="mt-1 w-full"
                :options="$modules"
                :selected="$selectedModules"
            >
                <option></option>
                @foreach ($modules as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-tom>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" variant="primary" wire:click="submit">Save changes</flux:button>
            </div>
        </div>
    </flux:modal>
    </form>
</div>
