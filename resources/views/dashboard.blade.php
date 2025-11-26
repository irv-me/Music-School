<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">{{ __("Welcome back, :name!", ['name' => Auth::user()->name]) }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-blue-100 dark:bg-blue-900 p-4 rounded-lg shadow">
                            <h4 class="text-xl font-bold text-blue-800 dark:text-blue-200">{{ __('Total Users') }}</h4>
                            <p class="text-3xl font-semibold text-blue-900 dark:text-blue-100">{{ $stats['users'] }}</p>
                        </div>
                        <div class="bg-green-100 dark:bg-green-900 p-4 rounded-lg shadow">
                            <h4 class="text-xl font-bold text-green-800 dark:text-green-200">{{ __('Total Courses') }}</h4>
                            <p class="text-3xl font-semibold text-green-900 dark:text-green-100">{{ $stats['courses'] }}</p>
                        </div>
                        <div class="bg-purple-100 dark:bg-purple-900 p-4 rounded-lg shadow">
                            <h4 class="text-xl font-bold text-purple-800 dark:text-purple-200">{{ __('Instruments') }}</h4>
                            <p class="text-3xl font-semibold text-purple-900 dark:text-purple-100">{{ $stats['instruments'] }}</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-medium mb-4">{{ __('Recent Courses') }}</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Instrument</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Teacher</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($recentCourses as $course)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $course->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $course->instrument->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $course->teacher->name ?? 'TBA' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">${{ number_format($course->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
