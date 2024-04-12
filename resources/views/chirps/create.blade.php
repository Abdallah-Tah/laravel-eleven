<x-app-layout :title="__('Create Chirp')">
    <x-slot name="header">
        <h2 class="flex items-center space-x-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{-- <x-breadcrumbs :links="[route('chirps.index') => __('Chirps'), __('New Chirp')]" /> --}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mx-auto">
                    <x-turbo::frame id="create_chirp" src="{{ route('chirps.create') }}">
                        @include('chirps.partials.new-chirp-trigger')
                    </x-turbo::frame>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
