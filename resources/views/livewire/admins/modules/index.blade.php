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

    public $showConfirmModal = false;

    public $deleteId;
    public $moduleName;


    #[On('refresh-list')]
    public function modules(): LengthAwarePaginator
    {
        return Module::where('name', 'like', '%'.$this->query.'%')->orderByDesc('created_at')->paginate(28);
    }

    #[On('moduleDeleted')]  
    public function refreshModules()
    {
        $this->modules();
        $this->resetPage();
    }

    public function delete() {
        $this->showConfirmModal = true;
    }

    public function confirmDelete($id) {
        $this->showConfirmModal = true;
        $this->moduleName = Module::find($id)->name;
        $this->deleteId = $id;
    }

    public function deleteModule()
    {
        Module::find($this->deleteId)->delete();
        $this->showConfirmModal = false;

        $this->deleteId = null;
        $this->dispatch('refresh-list');
    }

    public function deleteData() {
        $this->showConfirmModal = true;
    }

    public function edit($id)
    {
        $this->dispatch("editModule", $id);
    }

    public function with(): array
    {
        return [
            'modules' => $this->modules(),
        ];
    }
    
}; ?>

<div class=" mx-auto space-y-8">

    <div class="md:flex md:items-center md:justify-between">
    <div class="flex-1 min-w-0">
            <flux:heading level="3" size="xl">{{ __('Modules') }}</flux:heading>
        <flux:subheading>{{ __('Tous les modules') }}</flux:subheading>
    </div>
    <div class="mt-4 flex md:mt-0 md:ml-4">
        <flux:input icon="magnifying-glass" placeholder="Search modules" class="mr-3 flex-1 min-w-0 " wire:model.live="query" />
        <flux:modal.trigger name="add-module">
            <button class="btn btn-accent">{{ __('Ajouter un module') }}</button>
            <!-- <flux:button variant="primary" icon="plus-circle">{{ __('Ajouter un module') }}</flux:button> -->
        </flux:modal.trigger>
    </div>
    </div>

    <livewire:admins.modules.edit />

    <div class="grid grid-cols-1 sm:grid-cols-4 gap-2">
    @foreach ($modules as $module)
    <div class="card border border-base-300 bg-base-100 dark:bg-zinc-800 dark:border-zinc-700 transition-all duration-300 transform group hover:scale-102 p-2">
        <div class="card-body p-2">
            <h2 class="card-title text-sm dark:text-white">{{ $module->name }}</h2>
            <div class="card-actions justify-end">
                <!-- <button class="btn btn-accent btn-soft btn-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                        <path d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                    </svg>
                </button>
                <button class="btn btn-secondary btn-soft btn-xs" wire:click="confirmDelete({{ $module->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM8.28 7.22a.75.75 0 0 0-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 1 0 1.06 1.06L10 11.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L11.06 10l1.72-1.72a.75.75 0 0 0-1.06-1.06L10 8.94 8.28 7.22Z" clip-rule="evenodd" />
                    </svg>
                </button> -->
                <flux:button variant="filled" wire:click="edit({{ $module->id }})">Modifier</flux:button>
                <flux:button variant="danger" :loading="false" wire:click="confirmDelete({{ $module->id }})">Supprimer</flux:button>
            </div>
        </div>
    </div>
    @endforeach
</div>



<div class="mt-8">
    {{ $modules->links('vendor.pagination.tailwind-not-round') }}
</div>

    <flux:modal wire:model.self="showConfirmModal" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Supprimer module {{ $moduleName }}?</flux:heading>

                <flux:subheading>
                    <p>Vous êtes sur le point de supprimer ce module.</p>
                    <p>Cette action est irréversible.</p>
                </flux:subheading>
            </div>

            <div class="flex gap-2">
                <flux:spacer />

                <flux:modal.close>
                    <flux:button variant="ghost">Annuler</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" wire:click="deleteModule">Supprimer le module</flux:button>
            </div>
        </div>
    </flux:modal>


    <flux:modal name="add-module" variant="flyout">
        <livewire:admins.modules.create />
    </flux:modal>

    </div>

</div>
