<?php

use App\Models\Module;
use Livewire\WithPagination;
use Livewire\Volt\Component;

new class extends Component {
    use WithPagination;
    public function mount(): void
    {

    }

    public function with(): array
    {
        return [
            'modules' => Module::paginate(24),
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
    <flux:button variant="primary" href="{{ route('modules.create') }}">{{ __('Ajouter un module') }}</flux:button>
  </div>
</div>


    <div>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-4">

        @foreach ($modules as $module  )
        <div
                class="relative rounded-lg border border-gray-300 bg-white dark:bg-zinc-800 dark:border-zinc-700 600 px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                <!-- <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div> -->
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gray-400 dark:bg-gray-500 flex items-center justify-center text-white text-lg font-bold">
                    {{ strtoupper(substr($module->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <a href="#" class="focus:outline-none">
                        <span class="absolute inset-0" aria-hidden="true"></span>
                        <p class="text-sm font-medium text-gray-900 dark:text-zinc-100">{{ $module->name }}</p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">Co-Founder / CEO</p>
                    </a>
                </div>
            </div>
        @endforeach
        </div>

    </div>


    {{ $modules->links() }}

</div>
