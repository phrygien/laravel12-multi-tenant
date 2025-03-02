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

    // protected $listeners = [
    //     'moduleAdded' => 'refreshModules'
    // ];
    #[On('moduleAdded')]
    public function modules(): LengthAwarePaginator
    {
        return Module::where('name', 'like', '%'.$this->query.'%')->orderByDesc('created_at')->paginate(20);
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
        $this->dispatch('moduleDeleted');
    }

    public function deleteData() {
        $this->showConfirmModal = true;
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


    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">

    @foreach ($modules as $module)
    <div class="card card-border border-base-300 bg-base-100 dark:bg-zinc-800 dark:border-zinc-700 transition-all duration-300 transform group hover:scale-105 group-hover:!z-10 group-hover:blur-sm">
        <div class="card-body">
            <h2 class="card-title dark:text-white">{{ $module->name }}</h2>
            <div class="card-actions justify-end">
                <button class="btn btn-warning btn-dash">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                    </svg>
                </button>
                <button class="btn btn-secondary btn-dash" wire:click="confirmDelete({{ $module->id }})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
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
