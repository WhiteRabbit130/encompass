@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.css"/>

    @vite('resources/css/admin.index.css')
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    @vite('resources/js/admin.index.js')
@endpush



<x-app-layout>
    <div id="vue-app" class="">
        <!-- Modal -->
        <div class="modal fade" id="schedules-calendar-modal" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="#" name="save-event" method="post" @submit.prevent="saveSchedule()">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>                        
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Event start</label>
                                <input type="time" name="startTime" id="startTime" class="form-control col-xs-3" value=""/>
                                <input type="hidden" name="startDate" id="startDate" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Event end</label>
                                <input type="time" name="endTime" id="endTime" class="form-control col-xs-3" value=""/>
                                <input type="hidden" name="endDate" id="endDate" value=""/>
                            </div>
                            <div class="form-group">
                                <label>Teacher</label>
                                <select name="teachers" id="teacher_id" class="form-control col-xs-3">
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Instrument</label>
                                <select name="instruments" id="instrument_id" class="form-control col-xs-3">
                                    @foreach ($instruments as $instrument)
                                        <option value="{{ $instrument->id }}">
                                            {{ $instrument->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Parent</label>
                                <select name="parents" id="parent_id" class="form-control col-xs-3">
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}">
                                            {{ $parent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Student</label>
                                <select name="students" id="student_id" class="form-control col-xs-3">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit_event" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!---End Modal--->
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <i class="fas fa-calendar-alt mr-1"></i>
                {{ __('Scheduler') }}
            </h2>
        </x-slot>

        {{--Schedules Calendar--}}
        <div class="max-w-7xl mx-auto mt-12 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="card">
                                    <h5 class="card-header">
                                        <i class="fa-solid fa-calendar-alt mr-1"></i>
                                        Schedules
                                    </h5>
                                    <div class="card-body">
                                        <div id="schedules-calendar"></div>
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
            const vueApp = Vue.createApp({
                data() {
                    var schedules = <?php echo json_encode($schedules) ?>;

                    // init Calendar
                    let Events = [];
                    for(var i=0; i<schedules.length; i++) {
                        var data = {};
                        var item = schedules[i];
                        var title = item.start_time+' ~ '+item.end_time;
                        var start = item.start_date;
                        var end = item.end_date;

                        data.title = title;
                        data.start = start;
                        data.end = end;
                        Events.push(data);
                    }
                    
                    return {
                        Events,
                        calendar: '',
                    }
                },
                methods: {
                    EventHandler() {
                        let start = moment($('#startDate').val()).format('YYYY-MM-DD')
                        let end = moment($('#endDate').val()).format('YYYY-MM-DD')
                        let title = $('#startTime').val() + ' ~ ' + $('#endTime').val();

                        this.calendar.addEvent({
                            title: title,
                            start: start, // a property!
                            end: end // a property!
                        })
                        $('#schedules-calendar-modal').modal('hide');
                    },

                    saveSchedule(e) {
                        const start_time = $('#startTime').val();
                        const start_date = $('#startDate').val();
                        const end_time = $('#endTime').val();
                        const end_date = $('#endDate').val();
                        const teacher_id = $('#teacher_id').val();
                        const student_id = $('#student_id').val();
                        const parent_id = $('#parent_id').val();
                        const instrument_id = $('#instrument_id').val();

                        $(".spinner").removeClass('d-none');

                        const form_data = {
                            "start_time": start_time,
                            "start_date": start_date,
                            "end_time": end_time,
                            "end_date": end_date,
                            "teacher_id": teacher_id,
                            "student_id": student_id,
                            "parent_id": parent_id,
                            "instrument_id": instrument_id,
                        };

                        axios.post('/scheduler', form_data).then(response => {
                            /* Stop spinner */
                            $(".spinner").addClass('d-none');

                            if (response.data.status_code >= 200 && response.data.status_code <= 299) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: "Schedule added successfully!",
                                });

                                setTimeout(function () {
                                    window.location.reload();
                                }, 1000);
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: response.data.message,
                                });
                            }

                            // todo - refresh page, fix this, do better
                        }).catch((e) => {
                            console.log(e);
                            $(".spinner").addClass('d-none');
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!",
                            });
                        })
                    },
                },
                mounted() {
                    const calendarEl = document.getElementById('schedules-calendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        selectable: true,
                        select: (e) => {
                            console.log(e, moment(e.start).format('LLL'), moment(e.end).format('LLL'))
                            $('#schedules-calendar-modal').find('#startDate').val(moment(e.start).format('YYYY-MM-DD'));
                            $('#schedules-calendar-modal').find('#endDate').val(moment(e.end).format('YYYY-MM-DD'));
                            $('#schedules-calendar-modal').modal('show');
                        },
                        events: this.Events
                    });
                    this.calendar.render();
            
                    $('#submit_event').on('click',this.EventHandler)
                },
            });

            vueApp.mount('#vue-app');
        </script>
    @endpush
</x-app-layout>
