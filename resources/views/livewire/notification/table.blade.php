<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-20">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th colSpan="6" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-block w-3 h-3 bg-green-400 rounded-full"></span>
                                            <span class="font-bold">
                                                Active notification
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 group">
                                {{-- JIKA TANGGALNYA SUDAH BERAKHIR --}}
                                @if ($active_notification)
                                    @if (\Carbon\Carbon::now() < $active_notification->ended_at)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                            <div class="font-semibold text-gray-900">{!! $active_notification->content !!}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                            <div class="flex items-center space-x-5">
                                                <div class="flex flex-col w-auto">
                                                    <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($active_notification->started_at)->toDayDateTimeString() }}</p>
                                                    <p class="text-right text-sm text-gray-500">EST</p>
                                                </div>
                                                <span class="w-12 bg-gray-500 h-[1.1px]"></span>
                                                <div class="flex flex-col w-auto">
                                                    <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($active_notification->ended_at)->toDayDateTimeString() }}</p>
                                                    <p class="text-right text-sm text-gray-500">EST</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3 text-sm text-gray-500">
                                            <div class="invisible group-hover:visible">
                                                <div class="flex items-center justify-end space-x-4">
                                                    <span class="cursor-pointer hover:text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" wire:click='$emit("openModal", "notification.edit", {{ json_encode([
                                                            'notification' => $active_notification->id,
                                                        ]) }})'>
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                        </svg>
                                                    </span>
                                                    <span class="cursor-pointer hover:text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                    <span class="cursor-pointer hover:text-blue-500" wire:click='$emit("openModal", "notification.change-activate-status", {{ json_encode([
                                                        'notification' => $active_notification->id,
                                                    ]) }})'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                            <div class="flex flex-col">
                                                <div class="font-semibold text-gray-900">{!! $active_notification->content !!}</div>
                                                <div class="bg-red-500 text-white text-sm">This data was expired.</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                            <div class="flex items-center space-x-5">
                                                <div class="flex flex-col w-auto">
                                                    <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($active_notification->started_at)->toDayDateTimeString() }}</p>
                                                    <p class="text-right text-sm text-gray-500">EST</p>
                                                </div>
                                                <span class="w-12 bg-gray-500 h-[1.1px]"></span>
                                                <div class="flex flex-col w-auto">
                                                    <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($active_notification->ended_at)->toDayDateTimeString() }}</p>
                                                    <p class="text-right text-sm text-gray-500">EST</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap w-1/3 text-sm text-gray-500">
                                            <div class="invisible group-hover:visible">
                                                <div class="flex items-center justify-end space-x-4">
                                                    <span class="cursor-pointer hover:text-green-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                        </svg>
                                                    </span>
                                                    <span class="cursor-pointer hover:text-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                    <span class="cursor-pointer hover:text-blue-500" wire:click='$emit("openModal", "notification.change-activate-status", {{ json_encode([
                                                        'notification' => $active_notification->id,
                                                    ]) }})'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z" clip-rule="evenodd" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                @else
                                <tr>
                                    <td colspan="4" class="p-5">
                                        <div class="flex justify-center items-center space-x-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                  </svg>
                                            </span>
                                            <div class="uppercase text-gray-800 font-semibold">There is no active notification data.</div>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                            <tfoot class="bg-[#F2F9FF] divide-y divide-gray-200">
                                <tr>
                                    <td colSpan="3" class="px-6 py-2">
                                        <div class="flex items-center space-x-3">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                                  </svg>
                                            </span>
                                            <span class="text-sm text-gray-400 font-medium">
                                                Only one notification can be active.
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-12">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th colSpan="6" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center space-x-3">
                                            <span class="inline-block w-3 h-3 bg-red-400 rounded-full"></span>
                                            <span class="font-bold">
                                                Nonactive notification
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 group">
                                @forelse ($non_active_notifications as $notification)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                        <div class="font-semibold text-gray-900">{!! $notification->content !!}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap w-1/3">
                                        <div class="flex items-center space-x-5">
                                            <div class="flex flex-col w-auto">
                                                <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($notification->started_at)->toDayDateTimeString() }}</p>
                                                <p class="text-right text-sm text-gray-500">EST</p>
                                            </div>
                                            <span class="w-12 bg-gray-500 h-[1.1px]"></span>
                                            <div class="flex flex-col w-auto">
                                                <p class="text-left text-gray-900 font-medium text-sm">{{ \Carbon\Carbon::parse($notification->ended_at)->toDayDateTimeString() }}</p>
                                                <p class="text-right text-sm text-gray-500">EST</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 w-1/3">
                                        <div class="invisible group-hover:visible">
                                            <div class="flex items-center justify-end space-x-4">
                                                <span class="cursor-pointer hover:text-green-500" wire:click='$emit("openModal", "notification.edit", {{ json_encode([
                                                    'notification' => $notification->id,
                                                ]) }})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                </span>
                                                <span class="cursor-pointer hover:text-red-500" wire:click='$emit("openModal", "notification.delete", {{ json_encode([
                                                    'notification' => $notification->id,
                                                ]) }})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                </span>
                                                <span class="cursor-pointer hover:text-blue-500" wire:click='$emit("openModal", "notification.change-activate-status", {{ json_encode([
                                                    'notification' => $notification->id,
                                                ]) }})'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13a1 1 0 102 0V9.414l1.293 1.293a1 1 0 001.414-1.414z" clip-rule="evenodd" />
                                                      </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-5">
                                        <div class="flex justify-center items-center space-x-2">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                  </svg>
                                            </span>
                                            <div class="uppercase text-gray-800 font-semibold">There is no data.</div>
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
    </div>
</div>