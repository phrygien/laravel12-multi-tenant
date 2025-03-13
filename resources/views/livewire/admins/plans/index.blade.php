<?php

use App\Models\Plan;
use Livewire\Volt\Component;

new class extends Component {
    public function mount(): void
    {}

    public function with(): array
    {
        return [
            'plans' => Plan::all(),
        ];
    }
}; ?>

<div class="mx-auto space-y-8">

<flux:heading size="xl" level="1">{{ __('Tarifications') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your profile and account settings') }}</flux:subheading>
    <flux:separator variant="subtle" />

<!-- Features -->
<div class="overflow-hidden">
  <div class="max-w-full px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

    <div class="relative xl:w-10/12 xl:mx-auto">
      <!-- Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 lg:gap-8">

        @foreach ($plans as $plan)
        <div>
          <!-- Card -->
          <flux:callout icon="sparkles" variant="secondary" inline>
            <flux:callout.heading>{{ $plan->name }} / {{ $plan->price }} par mois</flux:callout.heading>

            <x-slot name="actions">
                <flux:button variant="ghost" href="{{ route('plans.edit', ['id' => $plan->id]) }}">{{ __('Details') }}</flux:button>
            </x-slot>
        </flux:callout>
          <!-- End Card -->
        </div>
        @endforeach
      </div>
      <!-- End Grid -->

    </div>
  </div>
</div>
<!-- End Features -->

<!-- Comparison Table -->
<div class="relative">
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 md:py-14 lg:py-20 mx-auto">
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
      <h2 class="text-2xl font-bold md:text-3xl md:leading-tight dark:text-white">{{ __('Comparer les plans') }}</h2>
    </div>

    <!-- Header -->
    <div class="hidden lg:block sticky top-0 start-0 py-2 bg-white/60 backdrop-blur-md dark:bg-neutral-900/60">
      <!-- Grid -->
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-2">
          <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
            Features
          </span>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
            Free
          </span>
          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            Free forever
          </p>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
            Startup
          </span>
          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            $39 per month billed annually
          </p>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
            Team
          </span>
          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            $89 per month billed annually
          </p>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <span class="font-semibold text-lg text-gray-800 dark:text-neutral-200">
            Enterprise
          </span>
          <p class="mt-2 text-sm text-gray-500 dark:text-neutral-500">
            $149 per month billed annually
          </p>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->
    </div>
    <!-- End Header -->

    <!-- Section -->
    <div class="space-y-4 lg:space-y-0">
      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 lg:py-3">
          <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            General
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Number of seats
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              1
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              Up to 3
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              Up to 10
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              Unlimited
            </span>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Storage
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              15 GB
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              1 TB
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              15 TB
            </span>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <span class="text-sm text-gray-800 dark:text-neutral-200">
              Unlimited
            </span>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Email sharing
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Any time, anywhere access
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->
    </div>
    <!-- End Section -->

    <!-- Section -->
    <div class="mt-6 space-y-4 lg:space-y-0">
      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 lg:py-3">
          <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            Financial data
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Open/High/Low/Close
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Price-volume difference indicator
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->
    </div>
    <!-- End Section -->

    <!-- Section -->
    <div class="mt-6 space-y-4 lg:space-y-0">
      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 lg:py-3">
          <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            On-chain data
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Network growth
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Average token age consumed
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Exchange flow
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Total ERC20 exchange funds flow
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Transaction volume
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Total circulation (beta)
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Velocity of tokens (beta)
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            ETH gas used
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->
    </div>
    <!-- End Section -->

    <!-- Section -->
    <div class="mt-6 space-y-4 lg:space-y-0">
      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 lg:py-3">
          <span class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
            Social data
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="hidden lg:block lg:col-span-1 py-1.5 lg:py-3 px-4 lg:px-0 lg:text-center">
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Dev activity
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Topic search
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->

      <!-- List -->
      <ul class="grid lg:grid-cols-6 lg:gap-6">
        <!-- Item -->
        <li class="lg:col-span-2 pb-1.5 lg:py-3">
          <span class="font-semibold lg:font-normal text-sm text-gray-800 dark:text-neutral-200">
            Relative social dominance
          </span>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Free
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Startup
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Team
            </span>
            <svg class="shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/></svg>
          </div>
        </li>
        <!-- End Item -->

        <!-- Item -->
        <li class="col-span-1 py-1.5 lg:py-3 border-b border-gray-200 dark:border-neutral-800">
          <div class="grid grid-cols-2 md:grid-cols-6 lg:block">
            <span class="lg:hidden md:col-span-2 text-sm text-gray-800 dark:text-neutral-200">
              Enterprise
            </span>
            <svg class="shrink-0 size-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
        </li>
        <!-- End Item -->
      </ul>
      <!-- End List -->
    </div>
    <!-- End Section -->

    <!-- Header -->
    <div class="hidden lg:block mt-6" hidden>
      <!-- Grid -->
      <div class="grid grid-cols-6 gap-6">
        <div class="col-span-2">
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
            Get started
          </a>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" href="#">
            Get started
          </a>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
            Get started
          </a>
        </div>
        <!-- End Col -->

        <div class="col-span-1">
          <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800" href="#">
            Get started
          </a>
        </div>
        <!-- End Col -->
      </div>
      <!-- End Grid -->
    </div>
    <!-- End Header -->

    <!-- Button Group -->
    <div class="mt-8 md:mt-12 flex justify-center items-center gap-x-3">
      <p class="text-sm text-gray-500 dark:text-neutral-400">
        Need a custom plan?
      </p>

      <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
        Contact us
      </button>
    </div>
    <!-- End Button Group -->
  </div>
</div>
<!-- End Comparison Table -->
</div>
