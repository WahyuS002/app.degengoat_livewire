<div>
    <form wire:submit.prevent="store">
        <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg leading-6 font-semibold text-gray-900 text-center" id="modal-title">
                Create a New Notification
            </h3>
            <div class="mt-8">
                <x-label for="content" :value="__('Content')" />
                <textarea id="content" wire:model.defer="content" class="px-4 py-5 rounded-md shadow-sm border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 editable">
                    {{ $content }}
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
            <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" >
                Cancel
            </button>
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                Create Notification
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