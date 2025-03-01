<?php

use App\Models\Module;
use Livewire\Attributes\Url;
use Livewire\WithPagination;
use Livewire\Volt\Component;
use Illuminate\Pagination\LengthAwarePaginator;

new class extends Component {
    use WithPagination;

    #[Url]
    public $query = '';

    #[Url(as: 'page', keep: true)] // Stocke la page actuelle dans l'URL
    public int $page = 1;

    public function modules(): LengthAwarePaginator
    {
        return Module::where('name', 'like', '%'.$this->query.'%')->paginate(10);
    }

    public function with(): array
    {
        return [
            'modules' => $this->modules(),
        ];
    }
}; ?>

<div class="max-w-7xl mx-auto space-y-8">

    <!-- This example requires Tailwind CSS v2.0+ -->
<div class="md:flex md:items-center md:justify-between">
  <div class="flex-1 min-w-0">
        <flux:heading level="3" size="xl">Gerer les modules</flux:heading>
    <flux:subheading>This information will be displayed publicly.</flux:subheading>
  </div>
  <div class="mt-4 flex md:mt-0 md:ml-4">
    <flux:input icon="magnifying-glass" placeholder="Search modules" class="mr-3" wire:model.live="query" />
    <flux:button variant="primary" href="{{ route('modules.create') }}">{{ __('Ajouter un module') }}</flux:button>
  </div>
</div>


    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border border-gray-200 dark:border-zinc-700 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                <thead class="bg-gray-50 dark:bg-zinc-700">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="dark:bg-zinc-800 dark:text-white dark:border-zinc-700 bg-white divide-y divide-gray-200 dark:divide-zinc-700">
                @foreach ($modules as $module  )
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white text-gray-900">{{ $module->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <flux:button variant="danger">Danger</flux:button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </table>
            </div>

            <div class="mt-8">

            <div wire:navigate>
                {{ $modules->links('vendor.pagination.tailwind-not-round') }}
            </div>
            </div>

            </div>
        </div>
    </div>

</div>
