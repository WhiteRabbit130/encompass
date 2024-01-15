@push('css')
    <style>
        #teachers-table_wrapper {
            overflow-x: auto;
        }

        #teachers-table thead th {
            text-align: center;
            background-color: #f2f2f2;
            font-weight: 600;
        }

        #teachers-table tbody tr {
            cursor: pointer;
            border-bottom: 1px solid #b2a6a6;
        }

        #teachers-table tbody tr.active-row {
            background-color: #cfcece; /* Light grey background */
            /*color: #333; !* Darker text color *!*/
        }

        #teachers-table_filter {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        #instruments-table_length select {
            min-width: 4.5rem;
            margin: 0 .8rem;
        }
    </style>

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>

    {{--todo - teachers.index.css --}}
    @vite('resources/css/admin.index.css')
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    @vite('resources/js/utils.js')
    @vite('resources/js/teachers.index.js')
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-chalkboard-teacher mr-1"></i>
            {{ __('Teachers') }}
        </h2>
    </x-slot>

    <div class="py-1" id="teacher">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Teachers Table -->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>
                                            <i class="fa-solid fa-person-chalkboard mr-1"></i>
                                            <i class="fa-solid fa-table-list mr-1"></i>
                                            Teachers Table
                                        </h3>
                                    </div>
                                    <div class="card-body px-2">
                                        <table id="teachers-table" class="display">
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

        <div id="vueapp">
            <div class="mt-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col mt-4">
                                    <div class="card">
                                        <h5 class="card-header">
                                            <i class="fa-solid fa-table-list mr-1"></i>
                                            Schedule
                                        </h5>
                                        <div class="card-body">
                                            <div id="teacher-calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')

        <script>
            // init Calendar
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('teacher-calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'dayGridMonth'
                });
                calendar.render();
            });
        </script>


        <script>
            // const vueapp = Vue.createApp({})
            // vueApp.mount('#vue-app');
        </script>
    @endpush
</x-app-layout>


