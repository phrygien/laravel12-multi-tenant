@props([
    'title' => 'Default Title',
    'description' => '',
    'price' => '',
    'currency' => 'USD',
    'period' => 'monthly',
    'buttonText' => 'Start free trial',
])

<div {{ $attributes->merge(['class' => 'p-4 relative z-10 bg-white border border-gray-200 rounded-xl md:p-10 dark:bg-neutral-900 dark:border-neutral-800']) }}>
    <!-- Titre et Description -->
    <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-200">{{ $title }}</h3>
    @if($description)
        <div class="text-sm text-gray-500 dark:text-neutral-500">{{ $description }}</div>
    @endif

    <!-- Prix -->
    @if($price)
        <div class="mt-5">
            <span class="text-6xl font-bold text-gray-800 dark:text-neutral-200">{{ $price }}</span>
            <span class="text-lg font-bold text-gray-800 dark:text-neutral-200">.00</span>
            <span class="ms-3 text-gray-500 dark:text-neutral-500">{{ $currency }} / {{ $period }}</span>
        </div>
    @endif

    <!-- Contenu dynamique via slot -->
    <div class="mt-5 grid sm:grid-cols-2 gap-y-2 py-4 first:pt-0 last:pb-0 sm:gap-x-6 sm:gap-y-0">
        {{ $slot }}
    </div>

    <!-- Footer avec info et bouton -->
    <div class="mt-5 grid grid-cols-2 gap-x-4 py-4 first:pt-0 last:pb-0">
        <div>
            <p class="text-sm text-gray-500 dark:text-neutral-500">Cancel anytime.</p>
            <p class="text-sm text-gray-500 dark:text-neutral-500">No card required.</p>
        </div>

        <div class="flex justify-end">
            <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                {{ $buttonText }}
            </button>
        </div>
    </div>
</div>
