<nav data-controller="responsive-nav"
    data-action="
        turbo:before-cache@window->responsive-nav#close
        click@window->responsive-nav#closeWhenClickedOutside
    "
    class="group bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('chirps.index')" :active="request()->routeIs('chirps.*')">
                        {{ __('Chirps') }}
                    </x-nav-link>
                </div>
            </div>
            ...
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div
        class="hidden group-data-[responsive-nav-open-value=true]:block sm:group-data-[responsive-nav-open-value=true]:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('chirps.index')" :active="request()->routeIs('chirps.*')">
                {{ __('Chirps') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
