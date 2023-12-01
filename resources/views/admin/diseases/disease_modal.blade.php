@section('styles')
<style>
    .max-widivh {
        max-widivh: 52rem !important;
    }
</style>

@endsection
<div class=" w-full bg-theme-primary-500 rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 border border-theme-success-200">
    <div class="flex justify-between items-center w-full">
        <div class="flex-col flex-1 items-center p-4">
            <div class="flex items-center mb-1">
                <h5 class="text-xl font-bold leading-none text-theme-secondary-100 dark:text-white me-1">
                    Disease Detail
                </h5>
            </div>
            @foreach ($data_card as $card_state => $card)
            <div class="dark:bg-gray-700 p-3 rounded-lg mt-1 pe-4" >
                <div class="grid grid-cols-4 gap-3 mb-2">
                    <div
                        class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <div
                            class="w-8 h-8 rounded-full bg-theme-primary-200 dark:bg-gray-500 text-theme-secondary-100 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{$card["all"]}}
                        </div>
                        <div class="text-theme-secondary-100 dark:text-orange-300 text-sm font-medium">
                            @if($card_state =='Khyber Pakhtunkhwa')
                                {{'KPK'}}
                            @else

                            {{$card_state}}
                            @endif
                        </div>
                    </div>
                    <div
                        class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <div
                            class="w-8 h-8 rounded-full bg-green-700 dark:bg-gray-500 text-theme-secondary-100 dark:text-orange-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{$card["male"]}}
                        </div>
                        <div class="text-theme-secondary-100 dark:text-orange-300 text-sm font-medium">Male</div>
                    </div>
                    <div
                        class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <div
                            class="w-8 h-8 rounded-full bg-theme-danger-500 dark:bg-gray-500 text-theme-secondary-100 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{$card["female"]}}
                        </div>
                        <div class="text-theme-secondary-100 dark:text-teal-300 text-sm font-medium">Female</div>
                    </div>
                    <div
                        class="bg-theme-primary-400 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                        <div
                            class="w-8 h-8 rounded-full bg-theme-warning-500 dark:bg-gray-500 text-theme-secondary-100 dark:text-blue-300 text-sm font-medium flex items-center justify-center mb-1">
                            {{$card["other"]}}
                        </div>
                        <div class="text-theme-secondary-100 dark:text-blue-300 text-sm font-medium">Other</div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        <div class="flex-col items-center">
            <div class="flex items-center mb-1">
                <h5 class="text-xl font-bold leading-none text-theme-secondary-100 dark:text-white me-1">
                    {{$disease->diagnose}}
                </h5>
            </div>
            @if($show_graph)
            <!-- Line Chart -->
            <div class="py-6 text-white" id="pie-chart"></div>
            @endif
        </div>
    </div>

</div>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script> --}}
<script>
    @if($show_graph)
    var dataIdPercentage = {!! json_encode($data_id_percentage) !!};

    var provinceNames = Object.keys(dataIdPercentage);
    var patientCounts = Object.values(dataIdPercentage);

    var getChartOptions = () => {
        return {
            series: patientCounts,
            colors: ["#1C64F2", "#16BDCA", "#9061F9", "#f4bd96"],
            chart: {
                height: 420,
                widivh: "100%",
                type: "pie",
            },
            stroke: {
                colors: ["white"],
                lineCap: "",
            },
            plotOptions: {
                pie: {
                    labels: {
                        show: true,
                    },
                    size: "100%",
                    dataLabels: {
                        offset: -25
                    }
                },
            },
            labels: provinceNames,
            dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
            },
            legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
            },
            yaxis: {
                labels: {
                    formatter: function (value) {
                        return value + "%"
                    },
                },
            },
            xaxis: {
                labels: {
                    formatter: function (value) {
                        return value + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
            },
        };
    };

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        var chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
        chart.render();
    }
    @endif
</script>
