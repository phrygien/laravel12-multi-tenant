<?php

use App\Models\Module;
use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Volt\Component;

new class extends Component {
    use WithPagination;

    public Plan $plan;
    public function mount(): void
    {
      
    }

    #[On('refreshModules')]
    public function modules()
    {
        $plan = Plan::find($this->plan->id);
        $planModules = $plan->modules()->paginate(5);
        return $planModules;
    }
    
    public function planFeatures()
    {
        $plan = Plan::find($this->plan->id);
        $planFeatures = $plan->features()->get();
        return $planFeatures;
    }

    public function attachModule($id)
    {
      $this->dispatch("attachModule", $this->plan);
    }

    public function detachModule($id)
    {
      $this->dispatch("detachModule", $id);
    }

    public function editFeature($id)
    {
      $this->dispatch("editFeature", $id);
    }

    public function with(): array
    {
        return [
            'plan' => Plan::find($this->plan->id),
            'modules' => $this->modules(),
            'planFeatures' => $this->planFeatures(),
        ];
    }
}; ?>

<div>
<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Details Plan') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Basic information sur le plan') }} {{ $plan->name }}</flux:subheading>
    <flux:separator variant="subtle" />
</div>

<livewire:admins.plans.attach-module :plan="$plan"/>
<livewire:admins.plans.detach-module :plan="$plan"/>
<!-- List -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
<div class="space-y-3">

  <dl class="flex flex-col sm:flex-row gap-1">
    <dt class="min-w-40">
      <span class="block text-sm text-gray-500 dark:text-neutral-500">{{ __('Nom du plan')}}:</span>
    </dt>
    <dd>
      <ul>
        <li class="me-1 after:content-[''] inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
         {{ $plan->name }}
        </li>
      </ul>
    </dd>
  </dl>

  <dl class="flex flex-col sm:flex-row gap-1">
    <dt class="min-w-40">
      <span class="block text-sm text-gray-500 dark:text-neutral-500">{{ __('Prix du plan ')}}:</span>
    </dt>
    <dd>
      <ul>
        <li class="me-1 after:content-[''] inline-flex items-center text-sm text-gray-800 dark:text-neutral-200">
          {{ $plan->price }} Ar par mois
        </li>
      </ul>
    </dd>
  </dl>
</div>
</div>
<!-- End List -->

<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                {{ __('Modules') }}
              </h2>
              <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Tous les modules rattaches au plan') }}       
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                  <flux:button wire:click="attachModule({{ $plan->id }})" variant="primary">{{__('Attacher un module')}}</flux:button>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">{{ __('Nom du module') }}</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($modules as $module)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $module->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <flux:button variant="danger" icon="minus-circle" wire:click="detachModule({{ $module->id }})"></flux:button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <!-- End Table -->
        </div>

        <!-- Footer -->
        <div class="mt-8">
            {{ $modules->links('vendor.pagination.tailwind-not-round') }}
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->


<!-- Table Section -->
<!-- Table Section -->
<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
  <!-- Card -->
  <div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
          <!-- Header -->
          <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
            <div>
              <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                {{ __('Features') }}
              </h2>
              <p class="text-sm text-gray-600 dark:text-neutral-400">
                {{ __('Tous les features rattaches au plan') }}       
              </p>
            </div>

            <div>
              <div class="inline-flex gap-x-2">
                  <flux:button wire:click="attachModule({{ $plan->id }})" variant="primary">{{__('Attacher un module')}}</flux:button>
              </div>
            </div>
          </div>
          <!-- End Header -->

          <!-- Table -->
          <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
          <thead>
            <tr>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">{{ __('Nom du feature') }}</th>
              <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">{{ __('Valeur') }}</th>
              <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
            @foreach ($planFeatures as $feature)
            <tr>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $feature->name }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">{{ $feature->value }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                <flux:button icon="pencil" wire:click="editFeature({{ $feature->id }})"> {{__('Modifier')}}</flux:button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
          <!-- End Table -->
        </div>

        <!-- Footer -->

        <!-- End Footer -->
      </div>
    </div>
  </div>
  <!-- End Card -->
</div>
<!-- End Table Section -->
<!-- End Table Section -->

</div>
