<?php

use App\Models\Module;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    #[Rule('required|unique:modules,name')]
    public string $name = '';

    public function mount(): void
    {
    }

    public function save()
    {
        $this->validate();
        Module::create($this->all());

        $this->reset();

        session()->flash('success', 'Le module a bien été ajouté.');
        $this->dispatch('moduleAdded');

    }
}; ?>

<div class="max-w-7xl mx-auto space-y-8">

<div>
    <flux:heading size="lg">{{ __('Ajouter un module') }}</flux:heading>
</div>

@if (session()->has('success'))
    <div x-data="{ show: true }" x-show="show" x-transition role="alert" class="alert alert-success">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
  </svg>
  <span>{{ session('success') }}</span>
</div>
@endif



    <div class="max-w-7xl mx-auto mt-6">
        <form wire:submit="save">
            <flux:fieldset>

                <flux:field>
                    <flux:label badge="Required">{{ __('Nom du module') }}</flux:label>

                    <flux:input type="text" wire:model.live="name" required />

                    <flux:error name="name" />
                </flux:field>

                <flux:button wire:click="save" class="float-right">
                        {{ __('Ajouter le module') }}
                </flux:button>

            </flux:fieldset>
            
        </form>
    </div>
</div>
