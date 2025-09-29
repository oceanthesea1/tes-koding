<x-guest-layout>
    <form method="POST" action="{{ route('classrooms.update', $classroom->id) }}">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="name" :value="__('Classroom Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name', $classroom->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Update Classroom') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
