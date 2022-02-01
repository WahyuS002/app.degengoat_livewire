<div class="bg-white p-3 rounded-lg">
    <div class="px-3">
        <div class="flex items-center justify-center space-x-3">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                  </svg>
            </span>
            @if ($notification->active)
            <h5 class="text-gray-900 font-semibold">Deactivate Notification</h5>
            @else
            <h5 class="text-gray-900 font-semibold">Preview Notification</h5>
            @endif
        </div>
        <div class="bg-[#12181B] w-full rounded-md p-4 text-white flex justify-center space-x-4 mt-3">
            <span class="uppercase text-[#12181B] bg-[#04CC68] px-2 font-bold text-sm rounded-md">info</span>
            <span>{!! $notification->content !!}</span>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-end">
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" >
            Cancel
        </button>
        @if ($notification->active)
        <button type="submit" wire:click="deactivate" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 text-base font-medium text-white hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-3 sm:w-auto sm:text-sm">
            Deactivate
        </button>
        @else
        <button type="submit" wire:click="activate" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-violet-600 text-base font-medium text-white hover:bg-violet-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-violet-500 sm:ml-3 sm:w-auto sm:text-sm">
            Activate
        </button>
        @endif
    </div>
</div>