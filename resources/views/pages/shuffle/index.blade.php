<x-app-layout>
    @section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shuffle') }}
        </h2>
        <x-button onclick="Livewire.emit('openModal', 'shuffle.create')">
            Create a new Shuffle
        </x-button>
    </div>
    @endsection

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-20">
            <livewire:shuffle.table>
        </div>
    </div>
</x-app-layout>
