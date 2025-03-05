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
        $this->dispatch('refresh-list');

    }
}; ?>

<div>
    <form wire:submit="save()">
        <flux:modal name="create-module" class="md:w-full">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Créer un module</flux:heading>
                    <flux:subheading>Remplissez les détails pour créer un nouveau module.</flux:subheading>
                </div>


                <flux:input wire:model.live="name" label="Nom du module" placeholder="" />

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary" wire:click="save()">Enregistrer</flux:button>
                </div>
            </div>
        </flux:modal>
    </form>
</div>