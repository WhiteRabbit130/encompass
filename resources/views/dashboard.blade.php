@push('css')
    <style>
    </style>
@endpush

@push('js')

    {{--    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"--}}
    {{--            integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw=="--}}
    {{--            crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
@endpush

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-gauge mr-1"></i>
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-3">

        <div class="row">
            <div class="col">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        {{--todo--}}
                        <div class="grid grid-cols-6 gap-4 mb-5">
                            <div class="col-span-full">
                                <div class="flex flex-wrap gap-4 justify-center">
                                    <div class="dark:bg-gray-800 bg-white shadow rounded-xl flex gap-4 !p-4">
                                        <div class="flex justify-center items-center">
                                            <div class="text-8xl font-extrabold">
                                                <p class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                                    <i class="fa fa-trophy-alt"></i>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex flex-col gap-4">
                                            <div>
                                                <div class="text-6xl font-bold text-center">
                                                    <p class="bg-clip-text text-transparent bg-gradient-to-r from-pink-500 to-violet-500">
                                                        32</p>
                                                </div>
                                            </div>
                                            <div class="flex gap-4">
                                                <div class="flex flex-col gap-4 text-center font-bold">
                                                    <p class="dark:text-gray-400 text-gray-500 text-xs">Guitar</p>
                                                    <span>44</span>
                                                </div>
                                                <div class="flex flex-col gap-4 text-center font-bold">
                                                    <p class="dark:text-gray-400 text-gray-500 text-xs">Singing</p>
                                                    <span>56</span>
                                                </div>
                                                <div class="flex flex-col gap-4 text-center font-bold">
                                                    <p class="dark:text-gray-400 text-gray-500 text-xs">Drum</p>
                                                    <span>20</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dark:bg-gray-800 bg-white shadow rounded-xl flex gap-4 !p-4">
                                        <div class="flex justify-center items-center">
                                            <div class="text-8xl font-extrabold">
                                                <p class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-emerald-500">
                                                    <i class="fa-thin fa-money-bill-trend-up"></i>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-4 items-center justify-center">
                                            <div>
                                                <div class="text-6xl font-bold text-center">
                                                    <p class="bg-clip-text text-transparent bg-gradient-to-r from-cyan-500 to-emerald-500">
                                                        8000 $</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--todo--}}
                        <div class="row">
                            <div class="col-sm-6 col-md-6 mt-2">
                                <div class="dark:bg-gray-800 bg-gray-200 p-4 rounded-lg flex flex-col gap-4">
                                    <div class="flex flex-wrap gap-3 items-center">
                                        <p class="text-xl font-bold">Guitar Lessons </p>
                                    </div>
                                    <hr class="dark:border-gray-600">
                                    <div>
                                        <canvas id="guitar-week-lessons-chart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 mt-2">
                                <div class="dark:bg-gray-800 bg-gray-200 p-4 rounded-lg flex flex-col gap-4">
                                    <div class="flex flex-wrap gap-3 items-center">
                                        <p class="text-xl font-bold">Student Enrollment</p>
                                    </div>
                                    <hr class="dark:border-gray-600">
                                    <div>
                                        <canvas class="  " id="student-enrollment-chart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 mt-2">
                                <div class="dark:bg-gray-800 bg-gray-200 p-4 rounded-lg flex flex-col gap-4">
                                    <div class="flex flex-wrap gap-3 items-center">
                                        <p class="text-xl font-bold">Revenue</p>
                                    </div>
                                    <div>
                                        <canvas id="revenue-by-month-chart"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 mt-2">
                                <div class="dark:bg-gray-800 bg-gray-200 p-4 rounded-lg flex flex-col gap-4">
                                    <div class="flex-1 overflow-auto dark:bg-gray-800 rounded-t-lg">
                                        <table class="w-full text-left border-collapse table-auto">
                                            <thead>
                                            <tr class="text-xs uppercase dark:text-gray-400 dark:text-slate-300 text-slate-700 bg-gray-100/40 dark:bg-gray-700/50">
                                                <th class="sticky z-10 top-0 font-semibold bg-gray-300/75 px-5 py-4 dark:bg-gray-900/75 backdrop-blur shadow-sm">
                                                    Class name
                                                </th>
                                                <th class="sticky z-10 top-0 font-semibold bg-gray-300/75 px-5 py-4 dark:bg-gray-900/75 backdrop-blur shadow-sm">
                                                    Active students
                                                </th>
                                                <th class="sticky z-10 top-0 font-semibold bg-gray-300/75 px-5 py-4 dark:bg-gray-900/75 backdrop-blur shadow-sm">
                                                    Teachers
                                                </th>
                                                <th class="sticky z-10 top-0 font-semibold bg-gray-300/75 px-5 py-4 dark:bg-gray-900/75 backdrop-blur shadow-sm">
                                                    Revenue/Coast (per month)
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr class="last:border-none border-b text-sm hover:dark:bg-gray-700 hover:bg-gray-100 border-gray-200 even:bg-transparent odd:bg-gray-300 odd:dark:bg-gray-900 dark:border-gray-700 text-gray-700 dark:text-white">
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="bg-cover bg-center"> Drum <a href="/student/7"
                                                                                             target="_blank"><i
                                                                class="fa fa-up-right-from-square text-blue-500"></i></a>
                                                    </div>

                                                </td>
                                                <td class="hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w-20">
                                                    <div class="text-center">8</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="text-center">5</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80 ">
                                                    <div class="font-bold"><span class="text-green-500">1200$</span> ▪
                                                        <span
                                                            class="text-red-500">500$</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="last:border-none border-b text-sm hover:dark:bg-gray-700 hover:bg-gray-100 border-gray-200 even:bg-transparent odd:bg-gray-300 odd:dark:bg-gray-900 dark:border-gray-700 text-gray-700 dark:text-white">
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="bg-cover bg-center"> Guitar <a href="/student/8"
                                                                                               target="_blank"><i
                                                                class="fa fa-up-right-from-square text-blue-500"></i></a>
                                                    </div>

                                                </td>
                                                <td class="hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w-20">
                                                    <div class="text-center">9</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="text-center">6</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80  ">
                                                    <div class="font-bold"><span class="text-green-500">722.22$</span> ▪
                                                        <span
                                                            class="text-red-500">338.89$</span></div>
                                                </td>
                                            </tr>
                                            <tr class="last:border-none border-b text-sm hover:dark:bg-gray-700 hover:bg-gray-100 border-gray-200 even:bg-transparent odd:bg-gray-300 odd:dark:bg-gray-900 dark:border-gray-700 text-gray-700 dark:text-white">
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="bg-cover bg-center"> Piano <a href="/student/10"
                                                                                              target="_blank"><i
                                                                class="fa fa-up-right-from-square text-blue-500"></i></a>
                                                    </div>

                                                </td>
                                                <td class="hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w-20">
                                                    <div class="text-center">1</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="text-center">1</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w- ">
                                                    <div class="font-bold"><span class="text-green-500">1701.43$</span>
                                                        ▪ <span
                                                            class="text-red-500">1528.53$</span></div>
                                                </td>
                                            </tr>
                                            <tr class="last:border-none border-b text-sm hover:dark:bg-gray-700 hover:bg-gray-100 border-gray-200 even:bg-transparent odd:bg-gray-300 odd:dark:bg-gray-900 dark:border-gray-700 text-gray-700 dark:text-white">
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="bg-cover bg-center"> Violin <a href="/student/10"
                                                                                               target="_blank"><i
                                                                class="fa fa-up-right-from-square text-blue-500"></i></a>
                                                    </div>

                                                </td>
                                                <td class="hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w-20">
                                                    <div class="text-center">6</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80">
                                                    <div class="text-center">4</div>
                                                </td>
                                                <td class="px-5 py-2 hover:dark:bg-gray-600/50 hover:bg-gray-300/80 w- ">
                                                    <div class="font-bold"><span class="text-green-500">701.43$</span> ▪
                                                        <span
                                                            class="text-red-500">428.53$</span></div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <h3 class="mb-3">
                            <i class="fas fa-gauge"></i>
                            {{ __('Dashboard') }}
                        </h3>

                        <div class="row">

                            {{--Drum Lessons--}}
                            <div class="col-12 col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa-solid fa-drum mr-1"></i>
                                        Drum Lessons
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-secondary" role="alert">
                                            <canvas id="drum-week-lessons-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Singing Lessons--}}
                            <div class="col-12 col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa-solid fa-microphone-lines mr-1"></i>
                                        Singing Lessons
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-secondary" role="alert">
                                            <canvas id="singing-week-lessons-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Piano Lessons--}}
                            <div class="col-12 col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa-solid fa-guitar mr-1"></i>
                                        Piano Lessons
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-secondary" role="alert">
                                            <canvas id="piano-week-lessons-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Violin Lessons--}}
                            <div class="col-12 col-md-6 mb-2">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa-solid fa-guitar mr-1"></i>
                                        Violin Lessons
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-secondary" role="alert">
                                            <canvas id="violin-week-lessons-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Guitar Lessons - todo - fix this --}}
                            <div class="col-12 col-md-4 mb-2 d-none">
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa-solid fa-guitar mr-1"></i>
                                        Guitar Lessons
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-secondary" role="alert">
                                            <canvas id="guitar-week-lessons-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--Guitar Lessons--}}
{{--                            <div class="col-12 col-md-4 mb-2">--}}
{{--                                <div class="card">--}}
{{--                                    <img class="card-img-top" src="holder.js/100x180/" alt="">--}}
{{--                                    <div class="card-header">--}}
{{--                                        <i class="fa-solid fa-guitar mr-1"></i>--}}
{{--                                        Guitar Lessons--}}
{{--                                    </div>--}}
{{--                                    <div class="card-body">--}}
{{--                                        <div class="alert alert-secondary" role="alert">--}}
{{--                                            --}}{{--todo - fix/remove--}}
{{--                                            <div>--}}
{{--                                                <div class="badge text-bg-info float-end">--}}
{{--                                                    <div class="spinner-border spinner-border-sm text-secondary" role="status">--}}
{{--                                                      <span class="visually-hidden">Loading...</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        </div>
    </div>
</x-app-layout>
