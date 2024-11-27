<div x-data="{ sidebarOpen: false }" class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <div 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'" 
        class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 transform transition-transform duration-300 sm:relative sm:translate-x-0 z-50"
    >
        <!-- Sidebar Header -->
        <div class="p-4 border-b">
            <h2 class="text-lg font-semibold">Menu</h2>
        </div>

        <!-- Sidebar Navigation -->
        <ul class="mt-4 space-y-2 px-4">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('jobs.index') }}" class="flex items-center space-x-3 py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-tasks"></i>
                    <span>Monitoramento de Jobs</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings.index') }}" class="flex items-center space-x-3 py-2 px-4 rounded-md text-gray-700 hover:bg-gray-100">
                    <i class="fas fa-cogs"></i>
                    <span>Configurações</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Sidebar Toggle Button (Mobile) -->
                    <button 
                        @click="sidebarOpen = !sidebarOpen" 
                        class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 sm:hidden"
                    >
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links (Desktop) -->
                    <div class="hidden sm:flex sm:space-x-8">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    </div>

                    <!-- Settings Dropdown -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium text-gray-500 bg-white rounded-md hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
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
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow p-6 bg-gray-50">
            @yield('content')
        </main>
    </div>
</div>