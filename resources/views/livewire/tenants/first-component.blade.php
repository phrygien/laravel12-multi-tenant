<?php

use Livewire\Volt\Component;

new class extends Component {
    
    public function sayHello(): void
    {
        dd("Hello");
    }
}; ?>

<div>
    <flux:button>Default</flux:button>
    <flux:button variant="primary">Primary</flux:button>
    <flux:button variant="filled">Filled</flux:button>
    <flux:button variant="danger" wire:click="sayHello">Livewire Work Fine!</flux:button>
    <flux:button variant="ghost">Ghost</flux:button>
    <flux:button variant="subtle">Subtle</flux:button>
</div>