<nav x-data="{ open: false }" class="bg-white shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="" class="flex items-center space-x-2">
                    <x-application-logo class="block h-9 w-auto fill-current text-pink-600" />
                    <span class="text-xl font-semibold text-pink-600">LumiSkin</span>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:flex space-x-8">
                <x-nav-link :href="route('landing')" :active="request()->routeIs('landing')" class="text-gray-700 hover:text-pink-600">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-700 hover:text-pink-600">
                    {{ __('Skincare Quiz') }}
                </x-nav-link>
                <x-nav-link :href="route('skincare.view')" :active="request()->routeIs('skincare.view')" class="text-gray-700 hover:text-pink-600">
                    {{ __('Lihat Produk') }}
                </x-nav-link>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-pink-600">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-5 w-5 text-gray-500 hover:text-pink-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-500 hover:text-pink-600 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-pink-600">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('landing')" :active="request()->routeIs('landing')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Skincare Quiz') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('skincare.view')" :active="request()->routeIs('skincare.view')">
                {{ __('Lihat Produk') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
