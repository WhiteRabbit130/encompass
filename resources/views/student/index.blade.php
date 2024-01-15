@push('css')
    <style>
        #students-table_wrapper {
            overflow-x: auto;
        }

        #students-table_length select {
            min-width: 4.5rem;
            margin: 0 .8rem;
        }
    </style>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>

    {{--todo - students.index.css --}}
    @vite('resources/css/admin.index.css')
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    @vite('resources/js/utils.js')
    @vite('resources/js/students.index.js')
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-user-graduate mr-1"></i>
            {{ __('Students') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Table -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3>
                                        <i class="fas fa-user-graduate mr-1"></i>
                                        <i class="fa-solid fa-table-list mr-1"></i>
                                        {{ __('Students Table') }}
                                    </h3>
                                </div>
                                <div class="card-body px-2">
                                    <table id="students-table" class="display">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Avatar</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
