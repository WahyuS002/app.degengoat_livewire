<div class="bg-white p-3 rounded-lg">
    <div class="flex space-x-4">
        <div>
            <span class="rounded-full p-3 bg-red-100 inline-block">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </span>
        </div>
        <div>
            <h5 class="text-gray-900 font-bold">Delete a notification data.</h5>
            <p>Are you sure you want to delete this notification data? All of your data will be permanently removed. This action cannot be undone.</p>
        </div>
    </div>
    <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-end">
        <button type="button" wire:click="$emit('closeModal')" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" >
            Cancel
        </button>
        <button type="submit" wire:click="destroy" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Delete
        </button>
    </div>
</div>