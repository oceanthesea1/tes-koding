<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Teachers') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <a href="{{ route('teachers.create') }}" class="text-blue-500 underline mb-4 inline-block">Add Teacher</a>

            <ul>
                @foreach ($teachers as $teacher)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $teacher->name }}</span>
                        <div class="flex space-x-4">
                            <a href="{{ route('teachers.show', $teacher->id) }}"
                               class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600">
                               View
                            </a>
                            <a href="{{ route('teachers.edit', $teacher->id) }}"
                               class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600">
                               Edit
                            </a>
                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600"
                                    onclick="return confirm('Delete Teacher?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
