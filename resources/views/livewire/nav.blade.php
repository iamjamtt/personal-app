<div>
    <nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <!-- Primary Navigation Menu -->
        <div class="max-w-full mx-auto px-4">
            <div class="flex justify-between h-10">
                <div class="flex">
                    <!-- Logo -->
                    @if (auth()->user()->role === 'admin')
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('admin.home') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                    @else
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('client.home') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                    @endif

                    <!-- Navigation Links -->
                    @if (auth()->user()->role === 'admin')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>
                    @else
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('client.home')" :active="request()->routeIs('client.home')">
                            {{ __('Home') }}
                        </x-nav-link>
                    </div>
                    @endif
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:gap-1 sm:ml-6">
                    @if (auth()->user()->photo_path)
                    <img class="w-8 h-8 rounded-full" src="{{ asset(auth()->user()->photo_path) }}" alt="photo">
                    @else
                    <div class="relative inline-flex items-center justify-center w-8 h-8 overflow-hidden bg-yellow-900 rounded-full dark:bg-yellow-400">
                        <span class="font-semibold text-gray-100 dark:text-gray-900 text-sm">
                            {{ auth()->user()->name[0] }}{{ auth()->user()->last_name[0] }}
                        </span>
                    </div>
                    @endif
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>
                                    {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                                </div>
                                <div class="ml-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="px-4 pt-2 pb-4 border-b-2 dark:border-b-slate-600">
                                <div class="font-medium text-base text-gray-700 dark:text-gray-200">
                                    {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                                </div>
                                <div class="font-medium text-sm text-gray-400">
                                    {{ auth()->user()->role }}
                                </div>
                            </div>

                            @if (auth()->user()->role === 'admin')
                            <x-dropdown-link :href="route('admin.perfil')"  :active="request()->routeIs('admin.perfil')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            @else
                            <x-dropdown-link :href="route('client.perfil')"  :active="request()->routeIs('client.perfil')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form>
                                <x-dropdown-link :href="route('logout')">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                @if (auth()->user()->role === 'admin')
                <x-responsive-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                @else
                <x-responsive-nav-link :href="route('client.home')" :active="request()->routeIs('client.home')">
                    {{ __('Home') }}
                </x-responsive-nav-link>
                @endif
            </div>
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                        {{ auth()->user()->name }} {{ auth()->user()->last_name }}
                    </div>
                    <div class="font-medium text-sm text-gray-500">
                        {{ auth()->user()->email }}
                    </div>
                </div>

                <div class="mt-3 space-y-1">
                    @if (auth()->user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.perfil')" :active="request()->routeIs('admin.perfil')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>
                    @else
                    <x-responsive-nav-link :href="route('client.perfil')" :active="request()->routeIs('client.perfil')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <x-responsive-nav-link :href="route('logout')">
                        {{ __('Cerrar Sesión') }}
                    </x-responsive-nav-link>
                </div>
            </div>
        </div>
    </nav>
</div>
