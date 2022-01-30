<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500" x-data="{ open: @entangle('open_modal') }">
    @if (\Carbon\Carbon::now() >= $shuffle->ended_at)
        @if ($shuffle->status == 'shuffled')
        <a href="{{ route('shuffle.export_winners', $shuffle->id) }}" class="hover:text-green-500 cursor-pointer transition-all duration-300 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
            </svg>
        </a>
        @else
        <button class="cursor-pointer text-white bg-gray-800 hover:bg-black duration-300 transition-all ease-in-out px-2 py-1 rounded-md" @click="open = true">
            Shuffle
        </button>
        @endif
    @else
    <p class="text-red-500 text-sm">Shuffle not ended yet.</p>
    @endif
    <div wire:ignore.self  class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-show="open">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                @if ($shuffle->total_winners_amount > $shuffle->shuffleParticipants->count())
                <form wire:submit.prevent="makeEveryoneWinners">
                @else
                <form wire:submit.prevent="shuffleData">
                @endif
                    <div class="bg-white px-4 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-semibold text-gray-900 text-center" id="modal-title">
                            Shuffle Data
                        </h3>
                        <div class="flex justify-center">
                            <div class="inline-block mt-2 px-2 py-1 rounded-full bg-gray-200">
                                <div class="flex items-center space-x-4">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                    </span>
                                    <span class="text-sm">
                                        Total Participants <span class="font-bold ml-1">{{ $shuffle->shuffleParticipants->count() }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            @if ($shuffle->total_winners_amount > $shuffle->shuffleParticipants->count())
                            <div class="w-full bg-orange-100 px-2 py-3 rounded-lg">
                                <div class="flex justify-center items-center space-x-7">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                          </svg>
                                    </span>
                                    <span class="break-words text-center font-medium">
                                        Participant is <span class="font-extrabold">less</span> than the total amount of winners, <br>
                                        did you want to make everyone a winner?
                                    </span>
                                </div>
                            </div>
                            @else
                            <div>
                                <x-label for="winner_amount" :value="__('Winner Amount')" />
                                <x-input id="winner_amount" class="block mt-1 w-full" type="number" required wire:model.prevenet="winner_amount" />
                                @error('winner_amount')
                                <span class="text-sm text-red-400">{{ $message }}</span>
                                @enderror
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 flex justify-center">
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false">
                            Cancel
                        </button>
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                            @if ($shuffle->total_winners_amount > $shuffle->shuffleParticipants->count())
                            Make Everyone Winners
                            @else
                            Shuffle
                            @endif
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</td>