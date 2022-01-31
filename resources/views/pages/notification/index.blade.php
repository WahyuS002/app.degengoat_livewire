<x-app-layout>

    @section('custom_styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
    @endsection

    @section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
        <livewire:notification.create>
    </div>
    @endsection

    <livewire:notification.table>

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
