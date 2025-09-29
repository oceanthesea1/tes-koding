<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Classrooms') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <a href="{{ route('classrooms.create') }}" class="text-blue-500 underline mb-4 inline-block">Add Classroom</a>

            <ul>
                @foreach ($classrooms as $classroom)
                    <li class="flex justify-between border-b py-2">
                        <span>{{ $classroom->name }}</span>
                        <div class="flex space-x-4">
                            <a href="{{ route('classrooms.show', $classroom->id) }}"
                               class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600">
                               View
                            </a>
                            <a href="{{ route('classrooms.edit', $classroom->id) }}"
                               class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600">
                               Edit
                            </a>
                            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="bg-gray-500 text-white rounded px-3 py-1 hover:bg-gray-600"
                                    onclick="return confirm('Delete Classroom?')">
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
