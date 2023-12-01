<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porto - Tailwind Template</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{--
    <link rel="stylesheet" href="assets/css/tailwind.css"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js"
        integrity="sha512-7x3zila4t2qNycrtZ31HO0NnJr8kg2VI67YLoRSyi9hGhRN66FHYWr7Axa9Y1J9tGYHVBPqIjSE1ogHrJTz51g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-gray-100">

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <nav class="flex items-center justify-between mb-40">
                <img class="h-20" src="{{ Storage::disk('site')->url(siteSetting('logo')) }}" alt="Logo">
                {{-- <img src="{{asset('site/assets/image/navbar-logo.png')}}" alt="Logo"> --}}

                <div>
                    <a href="#charts"
                        class="mx-2 px-7 py-2 md:px-9 md:py-2 bg-theme-primary-100 font-medium md:font-semibold text-theme-primary-700 text-md rounded-md hover:bg-theme-primary-400 hover:text-theme-primary-100 transition ease-linear duration-500">
                        Province/Disease
                    </a>
                    <a href="#charts"
                        class="mx-2 px-7 py-2 md:px-9 md:py-2 bg-theme-primary-100 font-medium md:font-semibold text-theme-primary-700 text-md rounded-md hover:bg-theme-primary-400 hover:text-theme-primary-100 transition ease-linear duration-500">
                        Gender/Desease
                    </a>

                </div>

                <a href="{{ route('login') }}"
                    class="px-7 py-3 md:px-9 md:py-4 bg-theme-primary-500 font-medium md:font-semibold text-theme-primary-100 text-md rounded-md hover:bg-theme-primary-100 hover:text-theme-primary-700 transition ease-linear duration-500">
                    Login
                </a>
            </nav>

            <div class="text-center">
                <div class="flex justify-center mb-16">
                    <img src="{{ Storage::disk('site')->url(siteSetting('logo')) }}" alt="Image">
                    {{-- <img src="{{asset('site/assets/image/home-img.png')}}" alt="Image"> --}}
                </div>

                <h6 class="font-medium text-gray-600 text-lg md:text-2xl uppercase mb-8">{{ siteSetting('website_name') }}</h1></h6>

                <h1 class="font-normal text-gray-900 text-2xl md:text-5xl leading-none mb-8">
                    {{ siteSetting('website_heading') }}</h1>

                {{-- <p class="font-normal text-gray-600 text-md md:text-xl mb-16">{{ siteSetting('about') }}</p> --}}

                {{-- <a href="#"
                    class="px-7 py-3 md:px-9 md:py-4 font-medium md:font-semibold bg-gray-700 text-gray-50 text-sm rounded-md hover:bg-gray-50 hover:text-gray-700 transition ease-linear duration-500">
                    Hire me
                </a> --}}
            </div>

        </div>

    </section>
    <!-- ====== About Section Start -->
    <section class="py-10 md:py-16">
        <div class="container mx-auto">
            <div class="flex flex-wrap items-center justify-between -mx-4">
                <div class="w-full px-4 lg:w-6/12">
                    <div class="flex items-center -mx-3 sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-4 sm:py-4">
                                <img src="{{ asset('site/assets/image/chart-1-d.png') }}" alt=""
                                    class="w-full rounded-2xl" />
                            </div>
                            <div class="py-4 sm:py-4">
                                <img src="{{ asset('site/assets/image/chart-3-d.png') }}" alt=""
                                    class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="{{ asset('site/assets/image/chart-2-d.png') }}" alt=""
                                    class="w-full rounded-2xl" />
                                <span class="absolute -right-7 -bottom-7 z-[-1]">
                                    <svg width="134" height="106" viewBox="0 0 134 106" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)"
                                            fill="#3056D3" />
                                        <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)"
                                            fill="#3056D3" />
                                        <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)"
                                            fill="#3056D3" />
                                        <circle cx="60.3334" cy="104" r="1.66667" transform="rotate(-90 60.3334 104)"
                                            fill="#3056D3" />
                                        <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)"
                                            fill="#3056D3" />
                                        <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)"
                                            fill="#3056D3" />
                                        <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)"
                                            fill="#3056D3" />
                                        <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)"
                                            fill="#3056D3" />
                                        <circle cx="1.66667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 89.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 89.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 89.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 89.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 117.667 89.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 89.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)"
                                            fill="#3056D3" />
                                        <circle cx="1.66667" cy="74.6673" r="1.66667"
                                            transform="rotate(-90 1.66667 74.6673)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 31.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 16.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 31.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)"
                                            fill="#3056D3" />
                                        <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 45.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 31.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 60.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 60.3333 30.9998)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 88.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 88.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="117.667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 117.667 74.6668)" fill="#3056D3" />
                                        <circle cx="117.667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 117.667 30.9998)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 74.6667 74.6668)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 74.6667 30.9998)" fill="#3056D3" />
                                        <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)"
                                            fill="#3056D3" />
                                        <circle cx="103" cy="30.9998" r="1.66667" transform="rotate(-90 103 30.9998)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="30.9998" r="1.66667" transform="rotate(-90 132 30.9998)"
                                            fill="#3056D3" />
                                        <circle cx="1.66667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 60.0003)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 16.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)"
                                            fill="#3056D3" />
                                        <circle cx="31" cy="16.3333" r="1.66667" transform="rotate(-90 31 16.3333)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 45.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 60.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 60.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 88.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 88.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="117.667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 117.667 60.0003)" fill="#3056D3" />
                                        <circle cx="117.667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 117.667 16.3333)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 74.6667 60.0003)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 74.6667 16.3333)" fill="#3056D3" />
                                        <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)"
                                            fill="#3056D3" />
                                        <circle cx="103" cy="16.3333" r="1.66667" transform="rotate(-90 103 16.3333)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="16.3333" r="1.66667" transform="rotate(-90 132 16.3333)"
                                            fill="#3056D3" />
                                        <circle cx="1.66667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 45.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 1.66667 1.66683)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 45.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 16.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="31" cy="45.3333" r="1.66667" transform="rotate(-90 31 45.3333)"
                                            fill="#3056D3" />
                                        <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 45.6667 45.3333)" fill="#3056D3" />
                                        <circle cx="45.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 45.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 60.3333 45.3338)" fill="#3056D3" />
                                        <circle cx="60.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 60.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 88.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 88.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="117.667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 117.667 45.3338)" fill="#3056D3" />
                                        <circle cx="117.667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 117.667 1.66683)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 74.6667 45.3338)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 74.6667 1.66683)" fill="#3056D3" />
                                        <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)"
                                            fill="#3056D3" />
                                        <circle cx="103" cy="1.66683" r="1.66667" transform="rotate(-90 103 1.66683)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)"
                                            fill="#3056D3" />
                                        <circle cx="132" cy="1.66683" r="1.66667" transform="rotate(-90 132 1.66683)"
                                            fill="#3056D3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2 xl:w-5/12">
                    <div class="mt-10 lg:mt-0">
                        <span class="block mb-4 text-lg font-semibold text-primary">
                            Why Choose Us
                        </span>
                        <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white sm:text-[40px]/[48px]">
                            Make your customers happy by giving services.
                        </h2>
                        <p class="mb-5 text-base text-body-color dark:text-dark-6">
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                            The point of using Lorem Ipsum is that it has a more-or-less.
                        </p>
                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            A domain name is one of the first steps to establishing your
                            brand. Secure a consistent brand image with a domain name that
                            matches your business.
                        </p>
                        <a href="javascript:void(0)"
                            class="inline-flex items-center justify-center py-3 text-base font-medium text-center text-white border border-transparent rounded-md px-7 bg-primary hover:bg-opacity-90">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== About Section End -->

    <section class="py-10 md:py-16" id="charts">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="text-center">
                <h6 class="font-medium text-gray-600 text-lg md:text-2xl uppercase mb-8"> CHARTS </h6>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-50 px-8 py-10 rounded-md mb-2">
                    <div class="w-full py-6 flex justify-center bg-gray-100 rounded-md mb-4">
                        <i data-feather="activity"></i>
                    </div>

                    {{-- <h4 class="font-medium text-gray-700 text-lg mb-4">High experience</h4> --}}


                    <div class="">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <div class="flex items-center mb-1">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                                        Website traffic</h5>
                                    <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                        class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                    </svg>
                                    <div data-popover id="chart-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Activity growth -
                                                Incremental</h3>
                                            <p>Report helps navigate cumulative growth of community activities. Ideally,
                                                the chart should have a growing trend, as stagnating chart signifies a
                                                significant decrease of community activity.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">Calculation</h3>
                                            <p>For each date bucket, the all-time volume of activities is calculated.
                                                This means that activities in period n contain all activities up to
                                                period n, plus the activities generated by your community in period.</p>
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
                                <button id="dateRangeButton" data-dropdown-toggle="dateRangeDropdown"
                                    data-dropdown-ignore-click-outside-class="datepicker" type="button"
                                    class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">31
                                    Nov - 31 Dev <svg class="w-3 h-3 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="dateRangeDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="p-3" aria-labelledby="dateRangeButton">
                                        <div date-rangepicker datepicker-autohide class="flex items-center">
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input name="start" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Start date">
                                            </div>
                                            <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                                            <div class="relative">
                                                <div
                                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 20">
                                                        <path
                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                    </svg>
                                                </div>
                                                <input name="end" type="text"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="End date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-end items-center">
                                <button id="widgetDropdownButton" data-dropdown-toggle="widgetDropdown"
                                    data-dropdown-placement="bottom" type="button"
                                    class="inline-flex items-center justify-center text-gray-500 w-8 h-8 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"><svg
                                        class="w-3.5 h-3.5 text-gray-800 dark:text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                        <path
                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                    </svg><span class="sr-only">Open dropdown</span>
                                </button>
                                <div id="widgetDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                        aria-labelledby="widgetDropdownButton">
                                        <li>
                                            <a href="#"
                                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                    class="w-3 h-3 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M7.418 17.861 1 20l2.139-6.418m4.279 4.279 10.7-10.7a3.027 3.027 0 0 0-2.14-5.165c-.802 0-1.571.319-2.139.886l-10.7 10.7m4.279 4.279-4.279-4.279m2.139 2.14 7.844-7.844m-1.426-2.853 4.279 4.279" />
                                                </svg>Edit widget
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                    class="w-3 h-3 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                                    <path
                                                        d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                                </svg>Download data
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                    class="w-3 h-3 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m5.953 7.467 6.094-2.612m.096 8.114L5.857 9.676m.305-1.192a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0ZM17 3.84a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Zm0 10.322a2.581 2.581 0 1 1-5.162 0 2.581 2.581 0 0 1 5.162 0Z" />
                                                </svg>Add to repository
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><svg
                                                    class="w-3 h-3 me-2" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 18 20">
                                                    <path
                                                        d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z" />
                                                </svg>Delete widget
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Line Chart -->
                        <div class="py-6" id="pie-chart"></div>

                        <div
                            class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                            <div class="flex justify-between items-center pt-5">
                                <!-- Button -->
                                <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                                    data-dropdown-placement="bottom"
                                    class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                                    type="button">
                                    Last 7 days
                                    <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="lastDaysdropdown"
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
                                    </ul>
                                </div>
                                <a href="#"
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Traffic analysis
                                    <svg class="w-2.5 h-2.5 ms-1.5 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md mb-2">
                    <div class="w-full py-6 flex justify-center bg-gray-100 rounded-md mb-4">
                        <i data-feather="codesandbox"></i>
                    </div>

                    {{-- <h4 class="font-medium text-gray-700 text-lg mb-4">Useful sandboxes</h4> --}}


                    <div class="">
                        <div class="flex justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                            <dl>
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                    Profit</dt>
                                <dd class="leading-none text-3xl font-bold text-gray-900 dark:text-white">
                                    $5,405</dd>
                            </dl>
                            <div>
                                <span
                                    class="bg-theme-success-100 text-theme-success-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-theme-success-900 dark:text-theme-success-300">
                                    <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                    </svg>
                                    Profit rate 23.5%
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 py-3">
                            <dl>
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                    Income</dt>
                                <dd
                                    class="leading-none text-xl font-bold text-theme-success-500 dark:text-theme-success-400">
                                    $23,635</dd>
                            </dl>
                            <dl>
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">
                                    Expense</dt>
                                <dd
                                    class="leading-none text-xl font-bold text-theme-danger-600 dark:text-theme-danger-500">
                                    -$18,230</dd>
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
                                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu -->
                                <div id="lastDaysdropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
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
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-theme-info-600 hover:text-theme-info-700 dark:hover:text-theme-info-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Revenue Report
                                    <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md mb-2">
                    <div class="w-full py-6 flex justify-center bg-gray-100 rounded-md mb-4">
                        <i data-feather="coffee"></i>
                    </div>

                    {{-- <h4 class="font-medium text-gray-700 text-lg mb-4">Success side projects</h4> --}}


                    <div class="">
                        <div class="flex justify-between mb-3">
                            <div class="flex items-center">
                                <div class="flex justify-center items-center">
                                    <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white pr-1">
                                        Your team's progress</h5>
                                    <svg data-popover-target="chart-info" data-popover-placement="bottom"
                                        class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ml-1"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z" />
                                    </svg>
                                    <div data-popover id="chart-info" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-lg opacity-0 w-96 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div class="p-3 space-y-2">
                                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                                Activity growth - Incremental</h3>
                                            <p>Report helps navigate cumulative growth of community
                                                activities. Ideally, the chart should have a growing
                                                trend, as stagnating chart signifies a significant
                                                decrease of community activity.</p>
                                            <h3 class="font-semibold text-gray-900 dark:text-white">
                                                Calculation</h3>
                                            <p>For each date bucket, the all-time volume of
                                                activities
                                                is calculated. This means that activities in period
                                                n
                                                contain all activities up to period n, plus the
                                                activities generated by your community in period.
                                            </p>
                                            <a href="#"
                                                class="flex items-center font-medium text-theme-info-600 dark:text-theme-info-500 dark:hover:text-theme-info-600 hover:text-theme-info-700 hover:underline">Read
                                                more <svg class="w-2 h-2 ml-1.5" aria-hidden="true"
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
                                    <dd class="text-orange-600 dark:text-orange-300 text-sm font-medium">
                                        To do</dd>
                                </dl>
                                <dl
                                    class="bg-teal-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                    <dt
                                        class="w-8 h-8 rounded-full bg-teal-100 dark:bg-gray-500 text-teal-600 dark:text-teal-300 text-sm font-medium flex items-center justify-center mb-1">
                                        23</dt>
                                    <dd class="text-teal-600 dark:text-teal-300 text-sm font-medium">
                                        In
                                        progress</dd>
                                </dl>
                                <dl
                                    class="bg-theme-info-50 dark:bg-gray-600 rounded-lg flex flex-col items-center justify-center h-[78px]">
                                    <dt
                                        class="w-8 h-8 rounded-full bg-theme-info-100 dark:bg-gray-500 text-theme-info-600 dark:text-theme-info-300 text-sm font-medium flex items-center justify-center mb-1">
                                        64</dt>
                                    <dd class="text-theme-info-600 dark:text-theme-info-300 text-sm font-medium">
                                        Done</dd>
                                </dl>
                            </div>
                            <button data-collapse-toggle="more-details" type="button"
                                class="hover:underline text-xs text-gray-500 dark:text-gray-400 font-medium inline-flex items-center">Show
                                more details <svg class="w-2 h-2 ml-1" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="more-details"
                                class="border-gray-200 border-t dark:border-gray-600 pt-3 mt-3 space-y-2 hidden">
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">
                                        Average task completion rate:</dt>
                                    <dd
                                        class="bg-theme-success-100 text-theme-success-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-theme-success-900 dark:text-theme-success-300">
                                        <svg class="w-2.5 h-2.5 mr-1.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                        </svg> 57%
                                    </dd>
                                </dl>
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">
                                        Days until sprint ends:</dt>
                                    <dd
                                        class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-1 rounded-md dark:bg-gray-600 dark:text-gray-300">
                                        13 days</dd>
                                </dl>
                                <dl class="flex items-center justify-between">
                                    <dt class="text-gray-500 dark:text-gray-400 text-sm font-normal">
                                        Next meeting:</dt>
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
                                    <svg class="w-2.5 m-2.5 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button>
                                <div id="lastDaysdropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-gray-700">
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
                                    class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-theme-info-600 hover:text-theme-info-700 dark:hover:text-theme-info-500  hover:bg-gray-100 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700 px-3 py-2">
                                    Progress report
                                    <svg class="w-2.5 h-2.5 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="flex flex-col lg:flex-row justify-between">
                <div class="mb-10 lg:mb-0">
                    <h1 class="font-medium text-gray-700 text-3xl md:text-4xl mb-5">Portfolio</h1>

                    <p class="font-normal text-gray-500 text-xs md:text-base">I have brought here my biggest and
                        favorite works <br> as a professional.</p>
                </div>

                <div class="space-y-24">
                    <div class="flex space-x-6">
                        <h1 class="font-normal text-gray-700 text-3xl md:text-4xl">01</h1>

                        <span class="w-28 h-0.5 bg-gray-300 mt-5"></span>

                        <div>
                            <h1 class="font-normal text-gray-700 text-3xl md:text-4xl mb-5">Demo API Generator</h1>

                            <p class="font-normal text-gray-500 text-sm md:text-base">A dummy data free and documented
                                API generator to facilitate <br> the process of testing the front-end portion of
                                projects.</p>
                        </div>
                    </div>

                    <div class="flex space-x-6">
                        <h1 class="font-normal text-gray-700 text-3xl md:text-4xl">02</h1>

                        <span class="w-28 h-0.5 bg-gray-300 mt-5"></span>

                        <div>
                            <h1 class="font-normal text-gray-700 text-3xl md:text-4xl mb-5">Demo API Generator</h1>

                            <p class="font-normal text-gray-500 text-sm md:text-base">A dummy data free and documented
                                API generator to facilitate <br> the process of testing the front-end portion of
                                projects.</p>
                        </div>
                    </div>

                    <div class="flex space-x-6">
                        <h1 class="font-normal text-gray-700 text-3xl md:text-4xl">03</h1>

                        <span class="w-28 h-0.5 bg-gray-300 mt-5"></span>

                        <div>
                            <h1 class="font-normal text-gray-700 text-3xl md:text-4xl mb-5">Demo API Generator</h1>

                            <p class="font-normal text-gray-500 text-sm md:text-base">A dummy data free and documented
                                API generator to facilitate <br> the process of testing the front-end portion of
                                projects.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <h1 class="font-medium text-gray-700 text-3xl md:text-4xl mb-5">Education</h1>

            <p class="font-normal text-gray-500 text-xs md:text-base mb-20">Below is a summary of the places I studied
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">
                    <h4 class="font-medium text-gray-700 text-lg mb-4">2015 – 2016</h4>

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <div class="relative">
                        <h6 class="font-semibold text-gray-500 text-md relative z-10">See the place here</h6>
                        <span class="w-32 h-1 bg-blue-200 absolute bottom-1 left-0 z-0"></span>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="text-center">
                <h1 class="font-normal text-gray-300 text-3xl md:text-6xl lg:text-7xl mb-20 md:mb-32 lg:mb-48">Please
                    do not measure your skills in <br> percentages!</h1>

                <p class="font-medium text-gray-700 text-xs md:text-base">In my many years of experience, I use
                    @laravel for backend projects and @vuejs for <br> front-end projects. I’m an avid programmer, so I
                    create designs based on the <br> weekend @figmadesign.</p>
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <h1 class="font-medium text-gray-700 text-3xl md:text-4xl mb-5">Experience</h1>

            <p class="font-normal text-gray-500 text-xs md:text-base mb-20">Below is a summary of the places I studied
            </p>

            <div class="flex flex-col lg:flex-row justify-between">
                <div class="space-y-8 md:space-y-16 mb-16 md:mb-0">
                    <h6 class="font-medium text-gray-400 text-base uppercase">Company</h6>

                    <p class="font-semibold text-gray-600 text-base">Massa Fames <span
                            class="font-normal text-gray-300">/ New York</span></p>

                    <p class="font-semibold text-gray-600 text-base">Massa Fames <span
                            class="font-normal text-gray-300">/ New York</span></p>

                    <p class="font-semibold text-gray-600 text-base">Massa Fames <span
                            class="font-normal text-gray-300">/ New York</span></p>

                    <p class="font-semibold text-gray-600 text-base">Massa Fames <span
                            class="font-normal text-gray-300">/ New York</span></p>

                    <p class="font-semibold text-gray-600 text-base">Massa Fames <span
                            class="font-normal text-gray-300">/ New York</span></p>
                </div>

                <div class="space-y-8 md:space-y-16 mb-16 md:mb-0">
                    <h6 class="font-medium text-gray-400 text-base uppercase">Position</h6>

                    <p class="font-normal text-gray-400 text-base">Junior Front-End Developer</p>

                    <p class="font-normal text-gray-400 text-base">Junior Front-End Developer</p>

                    <p class="font-normal text-gray-400 text-base">Junior Front-End Developer</p>

                    <p class="font-normal text-gray-400 text-base">Junior Front-End Developer</p>

                    <p class="font-normal text-gray-400 text-base">Junior Front-End Developer</p>
                </div>

                <div class="space-y-8 md:space-y-16">
                    <h6 class="font-medium text-gray-400 text-base uppercase">Year</h6>

                    <p class="font-normal text-gray-400 text-base">2016</p>

                    <p class="font-normal text-gray-400 text-base">2016</p>

                    <p class="font-normal text-gray-400 text-base">2016</p>

                    <p class="font-normal text-gray-400 text-base">2016</p>

                    <p class="font-normal text-gray-400 text-base">2016</p>
                </div>
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <h1 class="font-medium text-gray-700 text-3xl md:text-4xl mb-5">Brands</h1>

            <p class="font-normal text-gray-500 text-xs md:text-base mb-10 md:mb-20">Below is a summary of the places I
                studied</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <img src="{{ asset('site/assets/image/brand-1.png') }}" alt="Image">

                <img src="{{ asset('site/assets/image/brand-2.png') }}" alt="Image">

                <img src="{{ asset('site/assets/image/brand-3.png') }}" alt="Image">

                <img src="{{ asset('site/assets/image/brand-4.png') }}" alt="Image">

                <img src="{{ asset('site/assets/image/brand-5.png') }}" alt="Image">

                <img src="{{ asset('site/assets/image/brand-6.png') }}" alt="Image">
            </div>

        </div>

    </section>

    <section class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <h1 class="font-medium text-gray-700 text-3xl md:text-4xl mb-5">Testimonial</h1>

            <p class="font-normal text-gray-500 text-xs md:text-base mb-10 md:mb-20">Below is a summary of the places I
                studied</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>

                <div class="bg-gray-50 px-8 py-10 rounded-md">

                    <p class="font-normal text-gray-500 text-md mb-4">Lorem ipsum dolor sit amet, consectetur <br>
                        adipiscing elit, sed do eiusmod tempor <br> incididunt ut labore et dolore magna aliqua.</p>

                    <h6 class="font-semibold text-gray-500 text-md">Stephan Clark <span
                            class="font-medium text-gray-300 text-sm">- CEO at EarlyBird</span></h6>
                </div>
            </div>

        </div>

    </section>

    <footer class="py-10 md:py-16 mb-20 md:mb-40 lg::mb-52">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="text-center">
                <h1 class="font-medium text-gray-700 text-4xl md:text-5xl mb-5">Testimonial</h1>

                <p class="font-normal text-gray-400 text-md md:text-lg mb-20">I’m not currently taking on new client
                    work but feel free to contact me for any <br> other inquiries.</p>

                <div class="flex items-center justify-center space-x-8">
                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="twitter"
                            class="text-gray-500 hover:text-gray-800 transition ease-in-out duration-500"></i>
                    </a>

                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="dribbble"
                            class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                    </a>

                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="facebook"
                            class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                    </a>

                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="codepen"
                            class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                    </a>

                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="at-sign"
                            class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                    </a>

                    <a href="#"
                        class="w-16 h-16 flex items-center justify-center rounded-full hover:bg-gray-200 transition ease-in-out duration-500">
                        <i data-feather="instagram"
                            class="text-gray-500 hover:text-gray-700 transition ease-in-out duration-500"></i>
                    </a>
                </div>
            </div>

        </div>

    </footer>


    <script>
        feather.replace()
    </script>
    <script>
        let color1 = "#1C64F2";
        let color2 = "#16BDCA";
        let color3 = "#9061F9";
        let color4 = "#1C64F2";
        // ApexCharts options and config
        window.addEventListener("load", function() {

    $.ajax({
        url: `{{ route('admin.resource.fetchState') }}?id=${elem.value}`,
        type: 'GET',
        success: res => {
            let options = '<option value="">Select State...</option>';
            res.data.forEach(obj => {
                options += `<option value="${obj.id}">${obj.name}</option>`;
            });
            $(`select[name=${name}]`).html(options);
            $(`select[name=${name}]`).css({display: 'block'});
        },
        error: err => {
            console.error(err);
        }
    });
            const getChartOptions = () => {
                return {
                    series: [52.8, 26.8, 20.4],
                    colors: [color1, color2, color3],
                    chart: {
                        height: 420,
                        width: "100%",
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
                    labels: ["Direct", "Organic search", "Referrals"],
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
                            formatter: function(value) {
                                return value + "%"
                            },
                        },
                    },
                    xaxis: {
                        labels: {
                            formatter: function(value) {
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
                }
            }

            if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                chart.render();
            }
        });

        // ApexCharts options and config
        window.addEventListener("load", function() {

            var options = {
                colors: ["#f05252", "#2fc48d"],
                series: [{
                        name: "Organic",
                        color: "#f05252",
                        data: [{
                                x: "Mon",
                                y: 231
                            },
                            {
                                x: "Tue",
                                y: 122
                            },
                            {
                                x: "Wed",
                                y: 63
                            },
                            {
                                x: "Thu",
                                y: 421
                            },
                            {
                                x: "Fri",
                                y: 122
                            },
                            {
                                x: "Sat",
                                y: 323
                            },
                            {
                                x: "Sun",
                                y: 111
                            },
                        ],
                    },
                    {
                        name: "Social media",
                        color: "#2fc48d",
                        data: [{
                                x: "Mon",
                                y: 232
                            },
                            {
                                x: "Tue",
                                y: 113
                            },
                            {
                                x: "Wed",
                                y: 341
                            },
                            {
                                x: "Thu",
                                y: 224
                            },
                            {
                                x: "Fri",
                                y: 522
                            },
                            {
                                x: "Sat",
                                y: 411
                            },
                            {
                                x: "Sun",
                                y: 243
                            },
                        ],
                    },
                ],
                chart: {
                    type: "bar",
                    height: "320px",
                    fontFamily: "Inter, sans-serif",
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        columnWidth: "70%",
                        borderRadiusApplication: "end",
                        borderRadius: 8,
                    },
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    style: {
                        fontFamily: "Inter, sans-serif",
                    },
                },
                states: {
                    hover: {
                        filter: {
                            type: "darken",
                            value: 1,
                        },
                    },
                },
                stroke: {
                    show: true,
                    width: 0,
                    colors: ["transparent"],
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 2,
                        right: 2,
                        top: -14
                    },
                },
                dataLabels: {
                    enabled: false,
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    floating: false,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: false,
                },
                fill: {
                    opacity: 1,
                },
            }
            if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("column-chart"), options);
                chart.render();
            }
        });

        // ApexCharts options and config
        window.addEventListener("load", function() {
            var options = {
                series: [{
                        name: "Income",
                        color: "#31C48D",
                        data: ["1420", "1620", "1820", "1420", "1650", "2120"],
                    },
                    {
                        name: "Expense",
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
                    formatter: function(value) {
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

            if (document.getElementById("bar-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("bar-chart"), options);
                chart.render();
            }
        });

        // ApexCharts options and config
        window.addEventListener("load", function() {
            const getChartOptions = () => {
                return {
                    series: [90, 85, 70],
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
                    labels: ["Done", "In progress", "To do"],
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

            if (document.getElementById("radial-chart") && typeof ApexCharts !== 'undefined') {
                var chart = new ApexCharts(document.querySelector("#radial-chart"), getChartOptions());
                chart.render();
            }
        });

        // ApexCharts options and config
        window.addEventListener("load", function() {
            let options = {
                // enable and customize data labels using the following example, learn more from here: https://apexcharts.com/docs/datalabels/
                dataLabels: {
                    enabled: true,
                    // offsetX: 10,
                    style: {
                        cssClass: 'text-xs text-white font-medium'
                    },
                },
                grid: {
                    show: false,
                    strokeDashArray: 4,
                    padding: {
                        left: 16,
                        right: 16,
                        top: -26
                    },
                },
                series: [{
                        name: "Uploaded",
                        data: [150, 141, 145, 152, 135, 125, 205, 240, 280, 230, 192, 210],
                        color: "#31C48D",
                    },
                    {
                        name: "Pending",
                        data: [64, 41, 76, 41, 113, 123, 150, 141, 145, 152, 135, 125],
                        color: "#F05252",
                    },
                ],
                chart: {
                    height: "100%",
                    maxWidth: "100%",
                    type: "area",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: true,
                    },
                    toolbar: {
                        show: true,
                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: true,
                    },
                },
                legend: {
                    show: true
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        opacityFrom: 0.55,
                        opacityTo: 0,
                        shade: "#1C64F2",
                        gradientToColors: ["#1C64F2"],
                    },
                },
                stroke: {
                    width: 6,
                },
                xaxis: {
                    categories: ['01 Month', '02 Month', '03 Month', '04 Month', '05 Month',
                        '06 Month', '07 Month', '08 Month', '09 Month', '10 Month', '11 Month',
                        '12 Month'
                    ],
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        }
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
                        formatter: function(value) {
                            return value;
                        }
                    }
                },
            }

            if (document.getElementById("data-labels-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("data-labels-chart"), options);
                chart.render();
            }
        });
    </script>

</body>

</html>
