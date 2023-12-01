<x-app-layout>
    @section('styles')
    <link rel="stylesheet" href="{{ asset('assets/site/plugins/nice-select2/dist/css/nice-select2.css') }}" />
    <style>
        .nice-select .nice-select-dropdown {
            background-color: #004f7a;
        }

        .nice-select .option:hover,
        .nice-select .option.focus,
        .nice-select .option.selected.focus {
            background-color: #002b42;
        }
    </style>
    @endsection
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    {{ __('Dashboard') }}
                </h2>
                @can("$permission-create")
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="p-4 ">
        <div class="p-4 border-1 border-theme-success-200 border rounded-lg dark:border-gray-700 w-full">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="max-w-xl w-full bg-theme-primary-700 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="province_id_div">
                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                {{ __('Province') }}
                            </label>
                            <select required name="type" id="province_id"
                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                <option value="">{{ __('Select Option') }}</option>
                                @foreach ($states as $key => $state )
                                <option value="{{$state->id}}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="disease_id_div">
                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                {{ __('Disease') }}
                            </label>
                            <select required name="type" id="disease_id" multiple
                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                <option value="">{{ __('Select Option') }}</option>
                                @foreach ($diseases as $key => $disease)
                                <option value="{{ $disease->id }}">{{ $disease->diagnose }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 py-3">
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Male</dt>
                            <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400"
                                id="male_count">5</dd>
                        </dl>
                        <dl>
                            <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Female</dt>
                            <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500" id="female_count">
                                4</dd>
                        </dl>
                    </div>

                    <div id="bar-chart"></div>
                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                            <!-- Button -->
                            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                Last 6 months
                                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            {{-- <div id="lastDaysdropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            7 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            30 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            90 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            6 months</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            year</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Revenue Report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </a> --}}
                        </div>
                    </div>
                </div>

                {{-- <div class="max-w-sm w-full bg-theme-primary-700 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between">
                        <div>
                            <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k</h5>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400">Users this week</p>
                        </div>
                        <div
                            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                            12%
                            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                            </svg>
                        </div>
                    </div>
                    <div id="area-chart"></div>
                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                            <!-- Button -->
                            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                Last 7 days
                                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="lastDaysdropdown"
                                class="z-10 hidden bg-theme-primary-700 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            7 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            30 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            90 days</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Users Report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>


                <div class="max-w-sm w-full bg-theme-primary-700 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center">
                            <div class="flex justify-center items-center">
                                <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pe-1">Your
                                    team's progress</h5>
                                <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                    class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                </svg>
                                <div data-popover id="chart-info" role="tooltip"
                                    class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-theme-primary-700 border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                    <div class="p-3 space-y-2">
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth -
                                            Incremental</h3>
                                        <p>Report helps navigate cumulative growth of community activities. Ideally, the
                                            chart should
                                            have a growing trend, as stagnating chart signifies a significant decrease
                                            of community
                                            activity.</p>
                                        <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                        <p>For each date bucket, the all-time volume of activities is calculated. This
                                            means that
                                            activities in period n contain all activities up to period n, plus the
                                            activities generated
                                            by your community in period.</p>
                                        <a href="#"
                                            class="flex items-center font-medium text-blue-600 dark:text-blue-500 dark:hover:text-blue-600 hover:text-blue-700 hover:underline">Read
                                            more <svg class="w-2 h-2 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg></a>
                                    </div>
                                    <div data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                        <div class="grid grid-cols-3 gap-3 mb-2">
                            <dl
                                class="bg-orange-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                                    12</dt>
                                <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">To do</dd>
                            </dl>
                            <dl
                                class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                                    23</dt>
                                <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">In progress</dd>
                            </dl>
                            <dl
                                class="bg-blue-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt
                                    class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                                    64</dt>
                                <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Done</dd>
                            </dl>
                        </div>
                        <button data-collapse-toggle="more-details" type="button"
                            class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show
                            more details <svg class="w-2 h-2 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="more-details"
                            class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                            <dl class="flex items-center justify-between">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Average task completion
                                    rate:</dt>
                                <dd
                                    class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-green-900 dark:text-green-300">
                                    <svg class="w-2.5 h-2.5 me-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                    </svg> 57%
                                </dd>
                            </dl>
                            <dl class="flex items-center justify-between">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Days until sprint ends:
                                </dt>
                                <dd
                                    class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                    13 days</dd>
                            </dl>
                            <dl class="flex items-center justify-between">
                                <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">Next meeting:</dt>
                                <dd
                                    class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                    Thursday</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Radial Chart -->
                    <div class="py-6" id="radial-chart"></div>

                    <div
                        class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                        <div class="flex justify-between items-center pt-5">
                            <!-- Button -->
                            <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                data-dropdown-placement="bottom"
                                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                type="button">
                                Last 7 days
                                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="lastDaysdropdown"
                                class="z-10 hidden bg-theme-primary-700 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yesterday</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Today</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            7 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            30 days</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Last
                                            90 days</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#"
                                class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                Progress report
                                <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        var options = {
            searchable: true,
        };
        let countrySelectDropdown = NiceSelect.bind(document.getElementById("province_id"), options);
        let stateSelectDropdown = NiceSelect.bind(document.getElementById("disease_id"), options);

        let getAjaxData = (elem) => {
            console.log(elem);
        }
        $(function () {
            let searchInputValue = '';
            $("#province_id_div .nice-select-search, #disease_id_div .nice-select-search").keyup(function() {
                console.log(this)
                let mainDiv = $(this).parent().parent().parent().parent();
                let newDropDown;
                let currentSelect;
                let url;
                let elem = this;
                let value = this.value;

                if(mainDiv.attr('id') == 'province_id_div'){
                    newDropDown = countrySelectDropdown;
                    currentSelect = $('#country_id_div');
                    url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                }
                else if(mainDiv.attr('id') == 'disease_id_div'){
                    newDropDown = stateSelectDropdown;
                    currentSelect = $('#state_id_div');
                    url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                }
                let selectedValue = $(currentSelect).val();
                // newDropDown.update();
                $(elem).val(value);
                $(currentSelect).val(selectedValue);
            });
        });
    </script>
    {{-- <script>
        var provinceId = null;
        var diseaseId = null;

        $(document).ready(function () {
            $('#province_id').change(function () {
                provinceId = $(this).val();
                sendDataToController();
            });

            $('#disease_id').change(function () {
                diseaseId = $(this).val();
                sendDataToController();
            });

            function sendDataToController() {
                if (provinceId !== null && diseaseId !== null) {
                    $.ajax({
                        url: '{{route('admin.resource.graph')}}',
                        method: 'GET',
                        data: {
                            provinceId: provinceId,
                            diseaseId: diseaseId
                        },
                        success: function (response) {
                            console.log('Data sent to controller successfully:', response);

                        },
                        error: function (xhr, status, error) {
                            console.error('Error sending data to controller:', error);
                        }
                    });
                }
            }
        });
    </script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
 $(document).ready(function () {
    $('#province_id, #disease_id').change(function () {
        provinceId = $('#province_id').val();
        diseaseIds = $('#disease_id').val();
        if (provinceId !== null && diseaseIds.length > 0) {
            sendDataToController();
        }
    });

    function sendDataToController() {
            $.ajax({
                url: '{{ route('admin.resource.graph') }}',
                method: 'GET',
                data: {
                    provinceId: provinceId,
                    diseaseId: diseaseIds
                },
                success: function (response) {
                    $('#male_count').text(response.data.total_males);
                    $('#female_count').text(response.data.total_females);
                    updateChart(response);
                },
                error: function (xhr, status, error) {
                    console.error('Error sending data to controller:', error);
                }
            });
    }
    let $apexChart = null;
    function updateChart(data) {
        // console.log('Function Hit', data);
        // console.log('Function Hit', data.province.male);
        let diseases = data.data.diseases;
        let males = data.data.males;
        let females = data.data.females;
        let others = data.data.others;
        var options = {
            series: [
                {
                    name: "Male",
                    color: "#31C48D",
                    data: males
                },
                {
                    name: "Female",
                    color: "#F05252",
                    data: females
                },
                {
                    name: "Other",
                    color: "#ffab00",
                    data: others
                }
            ],
            chart: {
                sparkline: {
                    enabled: false
                },
                type: "bar",
                width: "100%",
                height: 400,
                toolbar: {
                    show: false
                }
            },
            fill: {
                opacity: 1
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    columnWidth: "100%",
                    borderRadiusApplication: "end",
                    borderRadius: 6,
                    dataLabels: {
                        position: "top"
                    }
                }
            },
            legend: {
                show: true,
                position: "bottom"
            },
            dataLabels: {
                enabled: false
            },
            tooltip: {
                shared: true,
                intersect: false,
                // formatter: function (value) {
                //     return "$" + value
                // }
            },
            xaxis: {
                labels: {
                    show: true,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    },
                    // formatter: function(value) {
                    //     return "$" + value
                    // }
                },
                categories: diseases,
                axisTicks: {
                    show: false
                },
                axisBorder: {
                    show: false
                }
            },
            yaxis: {
                labels: {
                    show: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                    }
                }
            },
            grid: {
                show: true,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: -20
                }
            }
        };
        if($apexChart){
            console.log('in');
            $apexChart.updateOptions(options);

        } else {
            console.log('out');
            $apexChart = new ApexCharts(document.getElementById("bar-chart"), options);
            $apexChart.render();
        }

}

    });
    </script>



    @endsection
</x-app-layout>
{{-- <script>
    window.addEventListener("load", function() {
                   var options = {
                  series: [
                    {
                      name: "Male",
                      color: "#31C48D",
                      data: ["1420", "1620", "1820", "1420", "1650", "2120"],
                    },
                    {
                      name: "Female",
                      data: ["788", "810", "866", "788", "1100", "1200"],
                      color: "#F05252",
                    }
                  ],
                  chart: {
                    sparkline: {
                      enabled: false,
                    },
                    type: "bar",
                    width: "100%",
                    height: 400,
                    toolbar: {
                      show: false,
                    }
                  },
                  fill: {
                    opacity: 1,
                  },
                  plotOptions: {
                    bar: {
                      horizontal: true,
                      columnWidth: "100%",
                      borderRadiusApplication: "end",
                      borderRadius: 6,
                      dataLabels: {
                        position: "top",
                      },
                    },
                  },
                  legend: {
                    show: true,
                    position: "bottom",
                  },
                  dataLabels: {
                    enabled: false,
                  },
                  tooltip: {
                    shared: true,
                    intersect: false,
                    formatter: function (value) {
                      return "$" + value
                    }
                  },
                  xaxis: {
                    labels: {
                      show: true,
                      style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                      },
                      formatter: function(value) {
                        return "$" + value
                      }
                    },
                    categories: ["Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    axisTicks: {
                      show: false,
                    },
                    axisBorder: {
                      show: false,
                    },
                  },
                  yaxis: {
                    labels: {
                      show: true,
                      style: {
                        fontFamily: "Inter, sans-serif",
                        cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                      }
                    }
                  },
                  grid: {
                    show: true,
                    strokeDashArray: 4,
                    padding: {
                      left: 2,
                      right: 2,
                      top: -20
                    },
                  },
                  fill: {
                    opacity: 1,
                  }
                }

                if(document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
                  const chart = new ApexCharts(document.getElementById("bar-chart"), options);
                  chart.render();
                }
              });
</script> --}}
