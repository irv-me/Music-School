<div class="min-h-screen w-64 bg-white dark:bg-gray-800 border-r border-gray-100 dark:border-gray-700 hidden sm:block">
    <div class="p-6 flex flex-col items-center justify-center">
        <a href="{{ route('dashboard') }}" class="flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" alt="MelodyGestor Logo" class="h-20 w-auto mb-2">
            <span class="text-xl font-bold text-gray-800 dark:text-gray-200">MelodyGestor</span>
        </a>
    </div>
    
    <nav class="mt-6 px-2 space-y-1">
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('courses.index')" :active="request()->routeIs('courses.*')">
            {{ __('Courses') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('instruments.index')" :active="request()->routeIs('instruments.*')">
            {{ __('Instruments') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('users.index')" :active="request()->routeIs('users.*')">
            {{ __('Users') }}
        </x-responsive-nav-link>
    </nav>
</div>
