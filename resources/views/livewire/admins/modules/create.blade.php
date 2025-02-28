<?php

use App\Models\Module;
use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component {
    #[Rule('required')]
    public string $name = '';

    public function save()
    {
        $this->validate();
        Module::create($this->all());
    }
}; ?>

<div class="max-w-7xl mx-auto space-y-8">

        <flux:heading level="3" size="xl">Gerer les modules</flux:heading>
        <flux:subheading>
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="#" icon="home" />
            <flux:breadcrumbs.item href="#">{{ __('Modules') }}</flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ __('Creation') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>
        </flux:subheading>

    <div class="max-w-7xl mx-auto mt-6">
        <form wire:submit="save">
            <flux:fieldset>
                <div class="space-y-6">
                    <flux:input label="Nom du module" placeholder="Entrez le nom du module" class="max-w-sm" wire:model.live="name" />
                    <flux:description>{{ __('Le nom du module sera affiché dans la liste des modules') }}</flux:description>
                    <flux:button wire:click="save">
                        Save changes
                    </flux:button>
                </div>
            </flux:fieldset>
        </form>
    </div>
</div>
