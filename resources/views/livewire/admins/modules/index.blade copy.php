<?php

use App\Models\Module;
use Flux\Flux;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Volt\Component;
use Livewire\Attributes\On; 
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component {
    use WithPagination;

    #[Url]
    public $query = '';

    #[On('refresh-list')]
    public function modules(): LengthAwarePaginator
    {
        return Module::where('name', 'like', '%'.$this->query.'%')->orderByDesc('id')->paginate(28);
    }

    public function edit($id)
    {
        $this->dispatch("editModule", $id);
    }

    public function deleteData($id): void
    {
        $this->dispatch("deleteModule", $id);
    }

    public function with(): array
    {
        return [
            'modules' => $this->modules(),
        ];
    }
    
}; ?>

<div class=" mx-auto space-y-8">

<div x-data="{ show: false, message: '' }" x-show="show" x-transition 
     @show-toast.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)" 
     class="fixed bottom-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg">
    <span x-text="message"></span>
</div>


    <div class="md:flex md:items-center md:justify-between">
    <div class="flex-1 min-w-0">
            <flux:heading level="3" size="xl">{{ __('Modules') }}</flux:heading>
        <flux:subheading>{{ __('Tous les modules') }}</flux:subheading>
    </div>
    <div class="mt-4 flex md:mt-0 md:ml-4">
        <flux:input icon="magnifying-glass" placeholder="Search modules" class="mr-3 flex-1 min-w-0 " wire:model.live="query" />
        <flux:modal.trigger name="create-module">
            <flux:button>Ajouter un module</flux:button>
        </flux:modal.trigger>
    </div>
    </div>

    <livewire:admins.modules.create />
    <livewire:admins.modules.edit />
    <livewire:admins.modules.delete />

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-2" wire:listen="refresh-list">
    @foreach ($modules as $module)
    <div class="card border border-base-300 bg-base-100 dark:bg-zinc-800 dark:border-zinc-700 transition-all duration-300 transform group hover:scale-102 p-2">
        <div class="card-body p-2">
            <h2 class="card-title text-sm dark:text-white">{{ $module->name }}</h2>
            <div class="card-actions justify-end">
                <flux:button wire:click="edit({{ $module->id }})">Modifier</flux:button>
                <flux:button variant="danger" wire:click="deleteData({{ $module->id }})" class="border border-white" :loading="false">Supprimer</flux:button>
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-8">
    {{ $modules->links('vendor.pagination.tailwind-not-round') }}
</div>
    
</div>
