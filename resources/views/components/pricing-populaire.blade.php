@props([
    'title' => 'Teams',
    'description' => 'For growing businesses.',
    'price' => '36.99',
    'currency' => 'USD',
    'period' => 'monthly',
    'features' => [],
    'highlight' => false,
])

<div class="shadow-xl shadow-gray-200 p-5 relative z-10 bg-white border border-gray-200 rounded-xl md:p-10 dark:bg-neutral-900 dark:border-neutral-800 dark:shadow-gray-900/20">
    <h3 class="text-xl font-bold text-gray-800 dark:text-neutral-200">{{ $title }}</h3>
    <div class="text-sm text-gray-500 dark:text-neutral-500">{{ $description }}</div>

    @if ($highlight)
        <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-white dark:text-neutral-800">
            Most popular
        </span>
    @endif

    <div class="mt-5">
        <span class="text-6xl font-bold text-gray-800 dark:text-neutral-200">${{ explode('.', $price)[0] }}</span>
        <span class="text-lg font-bold text-gray-800 dark:text-neutral-200">.{{ explode('.', $price)[1] ?? '00' }}</span>
        <span class="ms-3 text-gray-500 dark:text-neutral-500">{{ $currency }} / {{ $period }}</span>
    </div>

    <div class="mt-5 grid sm:grid-cols-2 gap-y-2 py-4 first:pt-0 last:pb-0 sm:gap-x-6 sm:gap-y-0">
        @foreach(array_chunk($features, ceil(count($features) / 2)) as $column)
            <ul class="space-y-2 text-sm sm:text-base">
                @foreach($column as $feature)
                    <li class="flex gap-x-3">
                        <span class="mt-0.5 size-5 flex justify-center items-center rounded-full bg-blue-50 text-blue-600 dark:bg-blue-800/30 dark:text-blue-500">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="20 6 9 17 4 12"/>
                            </svg>
                        </span>
                        <span class="text-gray-800 dark:text-neutral-200">{{ $feature }}</span>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>

    <div class="mt-5 grid grid-cols-2 gap-x-4 py-4 first:pt-0 last:pb-0">
        <div>
            <p class="text-sm text-gray-500 dark:text-neutral-500">Cancel anytime.</p>
            <p class="text-sm text-gray-500 dark:text-neutral-500">No card required.</p>
        </div>

        <div class="flex justify-end">
            <!-- Utilisation du slot 'footer' pour ajouter des boutons personnalisés -->
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
