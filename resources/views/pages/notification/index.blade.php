<x-app-layout>

    @section('custom_styles')
        <link rel="stylesheet" href="{{ asset('vendor/medium_editor/css/medium-editor.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/medium_editor/css/themes/default.min.css') }}">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css">
    @endsection

    @section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vote') }}
        </h2>
        <x-button onclick="Livewire.emit('openModal', 'notification.create')">
            Create a new Notification
        </x-button>
    </div>
    @endsection

    <livewire:notification.table>

</x-app-layout>
