<div class="flex flex-col">
    <div class="-my-2 min-h-screen overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-4">
            <div class="shadow border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                #
                            </th>
                            <th scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Participant
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Winners
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                End At
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($shuffles as $shuffle)
                        <tr>
                            <td class="px-6 py-8 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <p class="text-center text-sm font-semibold text-gray-900">{{ $loop->iteration }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-2 py-4 whitespace-nowrap max-w-xs">
                                <div class="text-sm text-gray-900">{{ $shuffle->title }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    switch ($shuffle->status) {
                                        case 'draf':
                                            $custom_style = 'bg-gray-100 text-gray-800';
                                            break;
                                        case 'opened':
                                            $custom_style = 'bg-green-100 text-green-800';
                                            break;
                                        case 'shuffled':
                                            $custom_style = 'bg-green-100 text-green-800';
                                            break;
                                        default:
                                            break;
                                    }
                                @endphp
                                @if ($shuffle->status == 'shuffled' || $shuffle->status == 'opened')
                                <div class="items-center {{ $custom_style }} rounded-lg inline-block px-4 py-2">
                                    <span class="inline-flex text-xs leading-5 font-semibold uppercase">
                                        {{ $shuffle->status }}
                                    </span>
                                </div>
                                @else
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <div class="items-center {{ $custom_style }} rounded-lg inline-block cursor-pointer px-4 py-2">
                                            <div class="flex">
                                                <span class="inline-flex text-xs leading-5 font-semibold uppercase">
                                                    {{ $shuffle->status }}
                                                </span>
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </x-slot>
                                    <x-slot name="content">
                                        <div class="z-10 px-4 py-3 space-y-2">
                                            <div class="bg-green-100 text-green-800 p-2 rounded-lg flex items-center space-x-2 cursor-pointer hover:bg-green-200 transition-all duration-300 ease-in-out" wire:click="updateStatus({{ $shuffle->id }} ,'opened')">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                        <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                      </svg>
                                                </span>
                                                <span class="text-sm uppercase ">
                                                    Opened
                                                </span>
                                            </div>
                                        </div>
                                    </x-slot>
                                </x-dropdown>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="bg-gray-100 inline-block px-5 py-1 rounded-md font-semibold">
                                    {{ $shuffle->shuffle_participants_count }} participants
                                </div>
                            </td>
                            <td class="px-3 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="bg-gray-100 inline-block px-5 py-1 rounded-md font-semibold">
                                    {{ $shuffle->total_winners_amount }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 rounded-full block bg-green-300"></span>
                                    <span class="ml-2">{{ \Carbon\Carbon::parse($shuffle->started_at)->toDayDateTimeString() }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex items-center">
                                    <span class="w-3 h-3 rounded-full block bg-red-300"></span>
                                    <span class="ml-2">{{ \Carbon\Carbon::parse($shuffle->ended_at)->toDayDateTimeString() }}</span>
                                </div>
                            </td>
                            <livewire:shuffle.shuffle-modal :shuffle="$shuffle">
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="p-5">
                                <div class="flex justify-center items-center space-x-2">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>
                                    </span>
                                    <div class="uppercase text-gray-800 font-semibold">empty data</div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>