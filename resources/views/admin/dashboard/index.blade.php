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

    <div class="flex p-4 ">
        <div class="p-4 border-1 border-theme-success-200 border rounded-lg dark:border-gray-700 w-full"
            style="width: 500px;">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="max-w-xl w-full bg-theme-primary-700 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6"
                    style="width: 467px;">
                    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="province_id_div">
                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                {{ __('Province') }}
                            </label>
                            <select required name="type" id="province_id"
                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                {{-- <option value="">{{ __('Select Option') }}</option> --}}
                                @foreach ($states as $key => $state)
                                <option value="{{ $state->id }}" @if ($key==0) selected @endif>{{ $state->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="disease_id_div">
                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                {{ __('Disease') }}
                            </label>
                            <select required name="type" id="disease_id" multiple
                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                @foreach ($diseases as $dKey => $disease)
                                <option value="{{ $disease->id }}" @if ($dKey==0 || $dKey==1 || $dKey==2 || $dKey==3)
                                    selected @endif>{{ $disease->diagnose }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 py-3">
                        <dl>
                            <dt class="text-base font-normal text-theme-secondary-100 dark:text-gray-400 pb-1">Male</dt>
                            <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400"
                                id="male_count">0</dd>
                        </dl>
                        <dl>
                            <dt class="text-base font-normal text-theme-secondary-100 dark:text-gray-400 pb-1">Female
                            </dt>
                            <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500" id="female_count">
                                0</dd>
                        </dl>
                    </div>

                    <div id="bar-chart"></div>
                </div>
            </div>
        </div>

        <div class="p-4 border-1 border-theme-success-200 border rounded-lg dark:border-gray-700 w-full"
            style="width: 421px; margin-left:20px;">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="max-w-sm w-full bg-theme-primary-700 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6"
                    style="width:467px">
                    <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                        <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-3" id="diseases_id_div">
                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                {{ __('Diasease') }}
                            </label>
                            <select required name="type" id="diseases_id" style="width: 310px;"
                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 block text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500  w-full placeholder-theme-primary-100">
                                <option value="">{{ __('Select Option') }}</option>
                                @foreach ($diseases as $key => $disease)
                                <option value="{{ $disease->id }}" @if ($key==0) selected @endif>{{ $disease->diagnose }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><br>
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center">
                            <div class="flex justify-center items-center">
                                <h5 id="diseaseName"
                                    class="text-xl font-bold leading-none text-theme-secondary-100 dark:text-white pe-1">
                                    Disease Name</h5>
                            </div>
                        </div>
                    </div>

                    <div class="bg-theme-primary-500 dark:bg-gray-700 p-3 rounded-lg">
                        <div class="grid grid-cols-3 gap-3 mb-2">
                            <dl class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="disease_maleCount"
                                    class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                                    0</dt>
                                <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">Male</dd>
                            </dl>
                            <dl
                                class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="disease_femaleCount"
                                    class="w-8 h-8 rounded-full bg-orange-100 dark:bg-gray-500 text-orange-600 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                                    0</dt>
                                <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">Female</dd>
                            </dl>
                            <dl
                                class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                <dt id="disease_otherCount"
                                    class="w-8 h-8 rounded-full bg-blue-100 dark:bg-gray-500 text-blue-600 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                                    0</dt>
                                <dd class="text-blue-600 dark:text-blue-300 text-sm font-medium">Other</dd>
                            </dl>
                        </div>
                    </div>

                    <!-- Radial Chart -->
                    <div class="py-6" id="radial-chart"></div>
                </div>
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
            let SelectDropdown = NiceSelect.bind(document.getElementById("diseases_id"), options);

            let getAjaxData = (elem) => {
                console.log(elem);
            }
            $(function() {
                let searchInputValue = '';
                $("#province_id_div .nice-select-search, #disease_id_div .nice-select-search, #diseases_id_div .nice-select-search")
                    .keyup(function() {
                        console.log(this)
                        let mainDiv = $(this).parent().parent().parent().parent();
                        let newDropDown;
                        let currentSelect;
                        let url;
                        let elem = this;
                        let value = this.value;

                        if (mainDiv.attr('id') == 'province_id_div') {
                            newDropDown = countrySelectDropdown;
                            currentSelect = $('#country_id_div');
                            url = `{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                        } else if (mainDiv.attr('id') == 'disease_id_div') {
                            newDropDown = stateSelectDropdown;
                            currentSelect = $('#state_id_div');
                            url = `{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                        }
                        let selectedValue = $(currentSelect).val();
                        // newDropDown.update();
                        $(elem).val(value);
                        $(currentSelect).val(selectedValue);
                    });
            });
    </script>
    <script>
        let $donutChart = null;
            function sendDataToController(provinceId, diseaseIds) {
            $.ajax({
            url: '{{ route('admin.resource.graph') }}',
            method: 'GET',
            data: {
            provinceId: provinceId,
            diseaseId: diseaseIds
            },
            success: function(response) {
            $('#male_count').text(response.data.total_males);
            $('#female_count').text(response.data.total_females);
            updateChart(response);
            },
            error: function(xhr, status, error) {
            console.error('Error sending data to controller:', error);
            }
            });
            }

            let $apexChart = null;

            function updateChart(data) {
            let diseases = data.data.diseases;
            let males = data.data.males;
            let females = data.data.females;
            let others = data.data.others;
            var options = {
            series: [{
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
            // return "$" + value
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
            // return "$" + value
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
            if ($apexChart) {
            console.log('in');
            $apexChart.updateOptions(options);

            } else {
            console.log('out');
            $apexChart = new ApexCharts(document.getElementById("bar-chart"), options);
            $apexChart.render();
            }

            }

            window.addEventListener('load', function() {

                provinceId = $('#province_id').val();
                diseaseIds = $('#disease_id').val();
                sendDataToController(provinceId, diseaseIds);
            });
            $(document).ready(function() {
                $('#province_id, #disease_id').change(function() {
                    provinceId = $('#province_id').val();
                    diseaseIds = $('#disease_id').val();
                    if (provinceId !== null && diseaseIds.length > 0) {
                        sendDataToController(provinceId, diseaseIds);
                    }
                });


            });
    </script>
    <script>
        function updateDiseaseChart(data) {
                    let diseases = data.data.diseases.name;
                    let males = data.data.diseases.males;
                    let females = data.data.diseases.females;
                    let others = data.data.diseases.others;
                    const getChartOptions = () => {
                        return {
                            series: [males, females, others],
                            colors: ["#1C64F2", "#16BDCA", "#FDBA8C"],
                            chart: {
                                height: "380px",
                                width: "100%",
                                type: "radialBar",
                                sparkline: {
                                    enabled: true,
                                },
                            },
                            plotOptions: {
                                radialBar: {
                                    track: {
                                        background: '#E5E7EB',
                                    },
                                    dataLabels: {
                                        show: false,
                                    },
                                    hollow: {
                                        margin: 0,
                                        size: "32%",
                                    }
                                },
                            },
                            grid: {
                                show: false,
                                strokeDashArray: 4,
                                padding: {
                                    left: 2,
                                    right: 2,
                                    top: -23,
                                    bottom: -20,
                                },
                            },
                            labels: ["Male", "Female", "Other"],
                            legend: {
                                show: true,
                                position: "bottom",
                                fontFamily: "Inter, sans-serif",
                            },
                            tooltip: {
                                enabled: true,
                                x: {
                                    show: false,
                                },
                            },
                            yaxis: {
                                show: false,
                                labels: {
                                    formatter: function(value) {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                    if ($donutChart) {
                        console.log('in');
                        $donutChart.updateOptions(getChartOptions());

                    } else {
                        console.log('out');
                        $donutChart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
                        $donutChart.render();
                    }
                }
         function diseaseDataToController(diseasesId) {
                    $.ajax({
                        url: '{{ route('admin.resource.diseaseGraph') }}',
                        method: 'GET',
                        data: {
                            diseasesId: diseasesId
                        },
                        success: function(response) {
                            $('#disease_maleCount').text(response.data.diseases.males);
                            $('#disease_femaleCount').text(response.data.diseases.females);
                            $('#disease_otherCount').text(response.data.diseases.others);
                            $('#diseaseName').text(response.data.diseases.name);
                            updateDiseaseChart(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error sending data to controller:', error);
                        }
                    });
                }
        window.addEventListener('load', function() {
        diseasesId = $('#diseases_id').val();
        diseaseDataToController(diseasesId);
        });
        $(document).ready(function() {
                $('#diseases_id').change(function() {
                    diseasesId = $('#diseases_id').val();
                    console.log(diseasesId);
                    if (diseasesId.length > 0) {
                        diseaseDataToController(diseasesId);
                    }
                });
            });
    </script>
    @endsection
</x-app-layout>
