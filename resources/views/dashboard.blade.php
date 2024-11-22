<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        <!-- Menu Dropdown -->
        <x-dropdown align="left" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700">
                                <div>{{ __('Menu', ) }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"/>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Liens dans le dropdown -->
                            <x-dropdown-link :href="route('Admin.index')">
                                {{ __('Administrateur') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('Reporting.index')">
                                {{ __('Reporting') }}
                            </x-dropdown-link>

                        </x-slot>
        </x-dropdown>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

        </div>


</x-app-layout>
