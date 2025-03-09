<?php

use App\Models\Plan;
use Flux\Flux;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Plan $plan;
    public $moduleId;
    #[On('detachModule')]
    public function detachModule($id): void
    {
        $this->moduleId = $id;
        Flux::modal('detach-module')->show();
    }

    public function submit()
    {
        $this->plan->modules()->detach($this->moduleId);
        Flux::modal('detach-module')->close();
        $this->dispatch('refreshModules');
    }
}; ?>

<div>
<form wire:submit="submit">
<flux:modal name="detach-module" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg">Detacher le module?</flux:heading>

            <flux:subheading>
                <p>You're about to delete this project.</p>
                <p>This action cannot be reversed.</p>
            </flux:subheading>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">Cancel</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="danger" wire:click="submit">Dettacher le module</flux:button>
        </div>
    </div>
</flux:modal>
</form>
</div>
