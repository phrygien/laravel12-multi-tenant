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
        return Module::where('name', 'like', '%'.$this->query.'%')->orderByDesc('id')->paginate(perPage: 18);
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

<div class="max-w-7xl mx-auto space-y-8">

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

    <div class="grid sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 gap-3 sm:gap-6">
    @foreach ($modules as $module)
    <!-- Card -->
    <a class="group flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl hover:text-fuchsia-600 hover:shadow-md focus:outline-hidden focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800">
      <div class="p-4 md:p-5">
        <div class="flex justify-between items-center gap-x-3">
          <div class="grow">
            <h3 class="group-hover:text-fuchsia-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
              {{ $module->name }}
            </h3>
            <p class="text-sm text-gray-500 dark:text-neutral-500">
            Créer le  {{ \Carbon\Carbon::parse($module->created_at)->translatedFormat('d F Y') }}

            </p>
          </div>
          <div class="card-actions justify-end opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                <flux:button icon="pencil" wire:click="edit({{ $module->id }})"></flux:button>
                <flux:button icon="minus-circle" variant="danger" wire:click="deleteData({{ $module->id }})" class="dark:border dark:border-zinc-700" :loading="false"></flux:button>
            </div>
        </div>
      </div>
    </a>
    <!-- End Card -->
    @endforeach
</div>


<div class="mt-8">
    {{ $modules->links('vendor.pagination.tailwind-not-round') }}
</div>
    
</div>
