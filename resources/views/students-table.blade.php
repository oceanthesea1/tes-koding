<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Students Table') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border px-4 py-2">Classrooms</th>
                                <th class="border px-4 py-2">Students</th>
                                <th class="border px-4 py-2">Student Parents</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classrooms as $classroom)
                                <tr>
                                    <td class="border px-4 py-2">{{ $classroom->name }}</td>
                                    <td class="border px-4 py-2">
                                        <ul class="list-disc pl-5">
                                            @foreach($classroom->students as $student)
                                                <li>{{ $student->name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="border px-4 py-2">
                                        <ul class="list-disc pl-5">
                                            @foreach($classroom->students as $student)
                                                <li>{{ $student->nama_ortu }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
