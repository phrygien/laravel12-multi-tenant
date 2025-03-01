<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="max-w-7xl mx-auto space-y-8">
    <flux:heading level="3" size="xl">Tarifications</flux:heading>
    <flux:subheading>This information will be displayed publicly.</flux:subheading>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-zinc-700">
                <thead class="bg-gray-50 dark:bg-zinc-700">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">Title</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium dark:text-white text-gray-500 uppercase tracking-wider">Role</th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    </tr>
                </thead>
                <tbody class="dark:bg-zinc-800 dark:text-white dark:border-zinc-700 bg-white divide-y divide-gray-200">
                    <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium dark:text-white text-gray-900">Jane Cooper</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm dark:text-white text-gray-500">Regional Paradigm Technician</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm dark:text-white text-gray-500">jane.cooper@example.com</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm dark:text-white text-gray-500">Admin</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <flux:button variant="danger">Danger</flux:button>
                    </td>
                    </tr>

                    <!-- More people... -->
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>


</div>
