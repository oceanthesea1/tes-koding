<x-guest-layout>
    <form method="POST" action="{{ route('students.store') }}">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Student Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="nama_ortu" :value="__('Student Parent Name')" />
            <x-text-input id="nama_ortu" class="block mt-1 w-full" type="text" name="nama_ortu" :value="old('nama_ortu')" required autofocus autocomplete="nama_ortu" />
            <x-input-error :messages="$errors->get('nama_ortu')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="classroom_id" :value="__('Classroom')" />
            <select id="classroom_id" name="classroom_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="" disabled selected>{{ __('Select Classroom') }}</option>
                @foreach ($classrooms as $classroom)
                    <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                        {{ $classroom->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('classroom_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Create Student') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
