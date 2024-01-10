@push('css')
    <style>
    </style>
@endpush
@push('js')
    <script>
    </script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-user-shield mr-1"></i>
            <i class="fas fa-tachometer-alt mr-1"></i>
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    @include('admin.nav.admin-nav')


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h3>
                            <i class="fas fa-user-shield mr-1"></i>
                            {{ __('Admin Dashboard') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
