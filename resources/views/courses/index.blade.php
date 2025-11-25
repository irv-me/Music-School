<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'staff')
                        <div class="flex justify-between mb-4">
                            <h3 class="text-lg font-bold">Courses List</h3>
                            <a href="{{ route('courses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add New Course
                            </a>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($courses as $course)
                            <div class="border rounded-lg p-4 shadow dark:border-gray-700">
                                <h4 class="text-xl font-bold mb-2">{{ $course->name }}</h4>
                                <p class="text-gray-600 dark:text-gray-400 mb-2">{{ Str::limit($course->description, 100) }}</p>
                                <p class="mb-1"><strong>Teacher:</strong> {{ $course->teacher->name ?? 'TBA' }}</p>
                                <p class="mb-1"><strong>Schedule:</strong> {{ $course->schedule }}</p>
                                <p class="mb-2"><strong>Price:</strong> ${{ number_format($course->price, 2) }}</p>
                                
                                @if(auth()->user()->role->name === 'admin' || auth()->user()->role->name === 'staff')
                                    <div class="mt-4 flex justify-end">
                                        <a href="{{ route('courses.edit', $course) }}" class="text-blue-600 hover:text-blue-900 mr-2">Edit</a>
                                        <form action="{{ route('courses.destroy', $course) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $courses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
