<?php

use App\Models\Module;
use App\Models\Plan;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public $planId;
    public $modules = [];
    public $selectedModules = []; // Propriété pour stocker les éléments sélectionnés

    public function mount()
    {

        // Récupérer les modules non associés au plan
        $modulesCollection = Module::all();
        $this->modules = $modulesCollection->pluck('name', 'id')->toArray();
    }

    #[On('attachModule')]
    public function attachModule(int $id): void
    {
        $this->planId = $id;

        // Récupérer les modules non associés au plan
        $modulesCollection = Module::whereDoesntHave('plans', function ($query) use ($id) {
            $query->where('plan_id', $this->planId);
        })->get();

        // Convertir la collection en tableau associatif [id => name]
        $this->modules = $modulesCollection->pluck('name', 'id')->toArray();
        // Ouvrir la modal d'attachement de module
        Flux::modal('attach-module')->show();
    }

    public function submit()
    {
        dd($this->selectedModules);
    }

    public function with(): array
    {
        return [
            'modules' => $this->modules
        ];
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
