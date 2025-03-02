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
        return Module::where('name', 'like', '%'.$this->query.'%')->orderByDesc('created_at')->paginate(10);
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

<div class="max-w-7xl mx-auto space-y-8">

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

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="table">
                        <!-- head -->
                        <thead class="bg-gray-50 dark:bg-zinc-700">
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">{{ __('Nom du module') }}</th>
                            <th class="text-right">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="dark:bg-zinc-800 dark:text-white dark:border-zinc-700 bg-white divide-y divide-gray-200 dark:divide-zinc-700">
                        <!-- row 1 -->
                         @foreach ( $modules as $module )
                         <tr>
                            <th>{{ $module->id }}</th>
                            <td>{{ $module->name }}</td>
                            <td class="text-right">
                            <button class="btn btn-primary">{{ __('Modifier') }}</button>
                            <button class="btn btn-secondary" wire:click="confirmDelete({{ $module->id }})">{{ __('Supprimer') }}</button>
                            </td>
                        </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-8">
                    {{ $modules->links('vendor.pagination.tailwind-not-round') }}
                </div>
            </div>

            </div>
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
