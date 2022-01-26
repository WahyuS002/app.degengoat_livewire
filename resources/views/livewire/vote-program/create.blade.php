<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Create a new Program') }}
                </h2>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150" wire:click="store">
                    Submit
                </button>
            </div>
        </div>
    </header>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border-t-8 border-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <label for="program_name" class="text-gray-800 block mb-1">
                        Program Name <span class="text-red-600">*</span>
                    </label>
                    <input id="program_name" type="text" class="appearance-none border-1 border-gray-300 rounded-md w-full py-3" placeholder="ex. Charity Program" wire:model="program_name" />
                </div>
            </div>
        </div>
        <div class="pt-8">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="grid grid-cols-6">
                        <div class="col-span-2 p-5 group cursor-pointer">
                            @if (isset($image[0]))
                                <img src="{{  $image[0]->temporaryUrl()  }}" alt="">
                            @else
                            <label for="image.0" class="w-full h-full py-12 rounded-md border-4 border-gray-200 border-dashed  cursor-pointer bg-gray-100 group-hover:border-green-400 group-hover:bg-green-100 transition-all duration-500 ease-in block">
                                <div class="flex flex-col items-center justify-center h-full font-semibold group-hover:text-green-600 transition-all duration-500 ease-in text-gray-400">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            />
                                        </svg>
                                    </span>
                                    Select image
                                </div>
                            </label>
                            @endif
                            <input id="image.0" wire:model="image.0" type="file" name="image" accept="image/*" class="hidden" />
                            @error('image.0')
                                <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4">
                            <div class="p-6 bg-white">
                                <div>
                                    <label for="title.0" class="text-gray-800 block mb-1">
                                        Title <span class="text-red-600">*</span>
                                    </label>
                                    <input id="title.0" name="title.0" type="text" class="appearance-none border border-gray-300 rounded-md w-full" wire:model="title.0" />
                                    @error('title.0')
                                        <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="description.0" class="text-gray-800 block mb-1">
                                        Description
                                    </label>
                                    <textarea id="description.0" name="description.0" rows="3" class="block w-full border border-gray-300 rounded-md" wire:model="description.0" ></textarea>
                                    @error('description.0')
                                        <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($inputs as $key => $value)
        <div class="pt-8">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="grid grid-cols-6">
                        <div class="col-span-2 p-5 group cursor-pointer">
                            @if (isset($image[$value]))
                                <img src="{{  $image[$value]->temporaryUrl()  }}" alt="">
                            @else
                            <label for="image.{{ $value }}" class="w-full h-full py-12 rounded-md border-4 border-gray-200 border-dashed  cursor-pointer bg-gray-100 group-hover:border-green-400 group-hover:bg-green-100 transition-all duration-500 ease-in block">
                                <div class="flex flex-col items-center justify-center h-full font-semibold group-hover:text-green-600 transition-all duration-500 ease-in text-gray-400">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path
                                            strokeLinecap="round"
                                            strokeLinejoin="round"
                                            strokeWidth="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            />
                                        </svg>
                                    </span>
                                    Select image
                                </div>
                            </label>
                            @endif
                            <input id="image.{{ $value }}" wire:model="image.{{ $value }}" type="file" accept="image/*" class="hidden" />
                            @error('image.' . $value)
                                <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-span-4">
                            <div class="p-6 bg-white">
                                <div>
                                    <label for="title.{{ $value }}" class="text-gray-800 block mb-1">
                                        Title <span class="text-red-600">*</span>
                                    </label>
                                    <input id="title.{{ $value }}" type="text" class="appearance-none border border-gray-300 rounded-md w-full" wire:model="title.{{ $value }}" />
                                    @error('title.' . $value)
                                        <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <label for="description.{{ $value }}" class="text-gray-800 block mb-1">
                                        Description
                                    </label>
                                    <textarea id="description.{{ $value }}" rows="3" class="block w-full border border-gray-300 rounded-md" wire:model="description.{{ $value }}" ></textarea>
                                    @error('description.' . $value)
                                        <span class="text-center text-red-600 font-medium">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t w-full sm:px-6 lg:px-8 py-3">
                        <div class="flex justify-end">
                            <span class="cursor-pointer" wire:click="remove({{ $key }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 stroke-current text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                    strokeLinecap="round"
                                    strokeLinejoin="round"
                                    strokeWidth="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="w-full flex justify-center mt-6">
            <span class="rounded-full bg-gray-800 p-2 cursor-pointer hover:bg-gray-700 transition-all duration-300 ease-in-out" wire:click.prevent="add({{ $i }})">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
            </span>
        </div>
    </div>
</div>
