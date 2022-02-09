<x-app-layout>
    @section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Shuffle') }}
        </h2>
    </div>
    @endsection

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-20">
            <form action="{{ route('shuffle.store') }}" method="post">
                @csrf
                <div class="bg-white px-4 pb-8 sm:p-6 sm:pb-8">
                    <div class="grid grid-cols-5 gap-6">
                        <div class="col-span-3">
                            <x-label for="title" :value="__('Title')" />
                            <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            @error('title')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <x-label for="total_winners_amount" :value="__('Winners')" />
                            <x-input id="total_winners_amount" class="block mt-1 w-full" type="number" name="total_winners_amount" :value="old('total_winners_amount')" required autofocus />
                            @error('total_winners_amount')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-span-1 relative">
                            <span class="absolute inset-y-0 left-0 top-6 flex items-center pl-2">
                                <span class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg class="h-4 w-4" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113 113.4"><polygon points="19.6 113.4 36 85 52.4 56.7 68.7 28.3 71.4 23.8 72.6 28.3 77.6 47 72 56.7 55.6 85 39.3 113.4 58.9 113.4 75.3 85 83.8 70.3 87.8 85 95.4 113.4 113 113.4 105.4 85 97.8 56.7 95.8 49.4 108 28.3 90.2 28.3 89.6 26.2 83.4 3 82.6 0 65.5 0 65.1 0.6 49.1 28.3 32.7 56.7 16.4 85 0 113.4 19.6 113.4"/></svg>
                                </span>
                            </span>
                            <x-label for="price" :value="__('price')" />
                            <x-input id="price" class="block mt-1 w-full pl-10" type="number" name="price" :value="old('price')" required autofocus />
                            @error('price')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <livewire:shuffle.create.time-estimation>
                </div>
                <div class="mt-8 flex justify-end space-x-5">
                    <a href="{{ route('shuffle.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-600 transition ease-in-out duration-150">
                        Back
                    </a>
                    <x-button type="submit">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    @section('custom_scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr(".date-input", {
            enableTime: true,
            minDate: 'today',
            dateFormat: "Y-m-d H:i",
        });
    </script>
    @endsection
</x-app-layout>
