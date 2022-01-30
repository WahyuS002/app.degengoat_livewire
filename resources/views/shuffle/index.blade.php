<x-app-layout>

    @section('custom_styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    @endsection

    @section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shuffle') }}
        </h2>
        <livewire:shuffle.create>
    </div>
    @endsection

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-20">
            <livewire:shuffle.table>
        </div>
    </div>

    @section('custom_scripts')
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            flatpickr(".date-input", {
                enableTime: true,
                minDate: 'today',
                dateFormat: "Y-m-d H:i",
            });
        </script>
    @endsection

</x-app-layout>
