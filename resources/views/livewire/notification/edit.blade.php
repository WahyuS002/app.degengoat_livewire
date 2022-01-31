<div>
    <link rel="stylesheet" href="{{ asset('vendor/medium_editor/css/medium-editor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/medium_editor/css/themes/default.min.css') }}">

    <div x-data="{ open: @entangle('open_modal') }">
        <span class="cursor-pointer hover:text-green-500" @click="open = true">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
        </span>
        <div wire:ignore class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-show="open">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form wire:submit.prevent="update">
                        <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                            <h3 class="text-lg leading-6 font-semibold text-gray-900 text-center" id="modal-title">
                                Edit Notification
                            </h3>
                            <div class="mt-8">
                                <x-label for="content" :value="__('Content')" />
                                <textarea id="content" wire:model.lazy="content" class="px-4 py-5 rounded-md shadow-sm border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 editable">
                                    {{-- {{ $content }} --}}
                                </textarea>
                                @error('content')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <x-label for="started_at" :value="__('Start At')" />
                                        <x-input id="started_at" class="date-input block mt-1 w-full" required wire:model="started_at" />
                                        @error('started_at')
                                        <span class="text-sm text-red-400">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <x-label for="ended_at" :value="__('End At')" />
                                        <x-input id="ended_at" class="date-input block mt-1 w-full" required wire:model="ended_at" />
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
                                Update Notification
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/medium_editor/js/medium-editor.min.js') }}"></script>

    <script>
        var editor = new MediumEditor('.editable', {
            buttonLabels: 'fontawesome',
            autoLink: true,
            toolbar: {
                buttons: ['bold', 'italic', 'unorderedlist', 'orderedlist', 'anchor']
            }
        })
        editor.subscribe('blur', function (event, editable) {
            @this.set('content', editor.getContent());
        });
    </script>

</div>
