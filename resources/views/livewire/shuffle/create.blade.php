{{-- <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form wire:submit.prevent="store">
                <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                    <h3 class="text-lg leading-6 font-semibold text-gray-900 text-center" id="modal-title">
                        Create a New Shuffle
                    </h3>
                    <div class="mt-8">
                        <div class="grid grid-cols-8 gap-4">
                            <div class="col-span-4">
                                <x-label for="title" :value="__('Title')" />
                                <x-input id="title" class="block mt-1 w-full" type="text" required placeholder="ex. Degen Goat Shuffle #1" wire:model="title" />
                                @error('title')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-2">
                                <x-label for="total_winners_amount" :value="__('Winners')" />
                                <x-input id="total_winners_amount" class="block mt-1 w-full" type="number" required wire:model="total_winners_amount" />
                                @error('total_winners_amount')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-span-2 relative">
                                <span class="absolute inset-y-0 left-0 top-6 flex items-center pl-2">
                                    <span class="p-1 focus:outline-none focus:shadow-outline">
                                        <svg class="h-4 w-4" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113 113.4"><polygon points="19.6 113.4 36 85 52.4 56.7 68.7 28.3 71.4 23.8 72.6 28.3 77.6 47 72 56.7 55.6 85 39.3 113.4 58.9 113.4 75.3 85 83.8 70.3 87.8 85 95.4 113.4 113 113.4 105.4 85 97.8 56.7 95.8 49.4 108 28.3 90.2 28.3 89.6 26.2 83.4 3 82.6 0 65.5 0 65.1 0.6 49.1 28.3 32.7 56.7 16.4 85 0 113.4 19.6 113.4"/></svg>
                                    </span>
                                </span>
                                <x-label for="price" :value="__('Price')" />
                                <x-input id="price" class="block mt-1 w-full pl-10" type="number" required wire:model="price" />
                                @error('price')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-label for="started_at" :value="__('Start At')" />
                                <x-input id="started_at" class="date-input block mt-1 w-full" required wire:model.lazy="started_at" />
                                @error('started_at')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <x-label for="ended_at" :value="__('End At')" />
                                <x-input id="ended_at" class="date-input block mt-1 w-full" required wire:model.lazy="ended_at" />
                                @error('ended_at')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center">
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                        Cancel
                    </button>
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Create Shuffle
                    </button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<div>
    <form wire:submit.prevent="store">
        <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-semibold text-gray-900 text-center" id="modal-title">
                Create a New Shuffle
            </h3>
            <div class="mt-8">
                <div class="grid grid-cols-8 gap-4">
                    <div class="col-span-4">
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" required placeholder="ex. Degen Goat Shuffle #1" wire:model="title" />
                        @error('title')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2">
                        <x-label for="total_winners_amount" :value="__('Winners')" />
                        <x-input id="total_winners_amount" class="block mt-1 w-full" type="number" required wire:model="total_winners_amount" />
                        @error('total_winners_amount')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-span-2 relative">
                        <span class="absolute inset-y-0 left-0 top-6 flex items-center pl-2">
                            <span class="p-1 focus:outline-none focus:shadow-outline">
                                <svg class="h-4 w-4" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 113 113.4"><polygon points="19.6 113.4 36 85 52.4 56.7 68.7 28.3 71.4 23.8 72.6 28.3 77.6 47 72 56.7 55.6 85 39.3 113.4 58.9 113.4 75.3 85 83.8 70.3 87.8 85 95.4 113.4 113 113.4 105.4 85 97.8 56.7 95.8 49.4 108 28.3 90.2 28.3 89.6 26.2 83.4 3 82.6 0 65.5 0 65.1 0.6 49.1 28.3 32.7 56.7 16.4 85 0 113.4 19.6 113.4"/></svg>
                            </span>
                        </span>
                        <x-label for="price" :value="__('Price')" />
                        <x-input id="price" class="block mt-1 w-full pl-10" type="number" required wire:model="price" />
                        @error('price')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-label for="started_at" :value="__('Start At')" />
                        <x-input id="started_at" class="date-input block mt-1 w-full" required wire:model.lazy="started_at" />
                        @error('started_at')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <x-label for="ended_at" :value="__('End At')" />
                        <x-input id="ended_at" class="date-input block mt-1 w-full" required wire:model.lazy="ended_at" />
                        @error('ended_at')
                        <span class="text-sm text-red-400">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center">
            <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                Create Shuffle
            </button>
        </div>
    </form>

    <script>
        flatpickr(".date-input", {
            enableTime: true,
            minDate: 'today',
            dateFormat: "Y-m-d H:i",
        });
    </script>
</div>