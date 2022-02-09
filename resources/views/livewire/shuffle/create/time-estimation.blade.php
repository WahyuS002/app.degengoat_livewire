<div>
    <div class="mt-8">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <x-label for="started_at" :value="__('Start At')" />
                <x-input id="started_at" class="date-input block mt-1 w-full" required name="started_at" wire:model="started_at" />
                @error('started_at')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label for="ended_at" :value="__('End At')" />
                <x-input id="ended_at" class="date-input block mt-1 w-full" required name="ended_at" wire:model="ended_at" />
                @error('ended_at')
                    <span class="text-sm text-red-400">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex items-center">
            <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
            <span class="text-sm font-semibold text-gray-500">
                Time estimation : {{ $estimate_time_in_hours ? $estimate_time_in_hours : '-' }}
            </span>
        </div>
    </div>
</div>
