<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{siteSetting('website_name')}}</title>
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

                <h6 class="font-medium text-gray-600 text-lg md:text-2xl uppercase mb-8">
                    {{ siteSetting('website_name') }}</h1>
                </h6>

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
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between">
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
                                        <circle cx="1.66667" cy="104" r="1.66667"
                                            transform="rotate(-90 1.66667 104)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="104" r="1.66667"
                                            transform="rotate(-90 16.3333 104)" fill="#3056D3" />
                                        <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)"
                                            fill="#3056D3" />
                                        <circle cx="45.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 45.6667 104)" fill="#3056D3" />
                                        <circle cx="60.3334" cy="104" r="1.66667"
                                            transform="rotate(-90 60.3334 104)" fill="#3056D3" />
                                        <circle cx="88.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 88.6667 104)" fill="#3056D3" />
                                        <circle cx="117.667" cy="104" r="1.66667"
                                            transform="rotate(-90 117.667 104)" fill="#3056D3" />
                                        <circle cx="74.6667" cy="104" r="1.66667"
                                            transform="rotate(-90 74.6667 104)" fill="#3056D3" />
                                        <circle cx="103" cy="104" r="1.66667"
                                            transform="rotate(-90 103 104)" fill="#3056D3" />
                                        <circle cx="132" cy="104" r="1.66667"
                                            transform="rotate(-90 132 104)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 89.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 89.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="89.3333" r="1.66667"
                                            transform="rotate(-90 31 89.3333)" fill="#3056D3" />
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
                                        <circle cx="103" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 103 89.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="89.3338" r="1.66667"
                                            transform="rotate(-90 132 89.3338)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="74.6673" r="1.66667"
                                            transform="rotate(-90 1.66667 74.6673)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 31.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 16.3333 74.6668)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 31.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 31 74.6668)" fill="#3056D3" />
                                        <circle cx="31" cy="31.0003" r="1.66667"
                                            transform="rotate(-90 31 31.0003)" fill="#3056D3" />
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
                                        <circle cx="103" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 103 74.6668)" fill="#3056D3" />
                                        <circle cx="103" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 103 30.9998)" fill="#3056D3" />
                                        <circle cx="132" cy="74.6668" r="1.66667"
                                            transform="rotate(-90 132 74.6668)" fill="#3056D3" />
                                        <circle cx="132" cy="30.9998" r="1.66667"
                                            transform="rotate(-90 132 30.9998)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 1.66667 60.0003)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 16.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 16.3333 60.0003)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 16.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 31 60.0003)" fill="#3056D3" />
                                        <circle cx="31" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 31 16.3333)" fill="#3056D3" />
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
                                        <circle cx="103" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 103 60.0003)" fill="#3056D3" />
                                        <circle cx="103" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 103 16.3333)" fill="#3056D3" />
                                        <circle cx="132" cy="60.0003" r="1.66667"
                                            transform="rotate(-90 132 60.0003)" fill="#3056D3" />
                                        <circle cx="132" cy="16.3333" r="1.66667"
                                            transform="rotate(-90 132 16.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 1.66667 45.3333)" fill="#3056D3" />
                                        <circle cx="1.66667" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 1.66667 1.66683)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 16.3333 45.3333)" fill="#3056D3" />
                                        <circle cx="16.3333" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 16.3333 1.66683)" fill="#3056D3" />
                                        <circle cx="31" cy="45.3333" r="1.66667"
                                            transform="rotate(-90 31 45.3333)" fill="#3056D3" />
                                        <circle cx="31" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 31 1.66683)" fill="#3056D3" />
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
                                        <circle cx="103" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 103 45.3338)" fill="#3056D3" />
                                        <circle cx="103" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 103 1.66683)" fill="#3056D3" />
                                        <circle cx="132" cy="45.3338" r="1.66667"
                                            transform="rotate(-90 132 45.3338)" fill="#3056D3" />
                                        <circle cx="132" cy="1.66683" r="1.66667"
                                            transform="rotate(-90 132 1.66683)" fill="#3056D3" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 lg:w-1/2">
                    <div class="mt-10 lg:mt-0">
                        <span class="block mb-4 text-lg font-semibold text-primary">
                            NDTS
                        </span>
                        <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white sm:text-[40px]/[48px]">
                            {{ siteSetting('website_heading') }}
                        </h2>
                        <p class="mb-5 text-base text-body-color dark:text-dark-6">
                            Welcome to the National Disease Tracking System! We are one of your go-to resource for
                            accurate information about transmitting or spread of any diseases in Pakistan. Our platform
                            is made for the needs of the general public and doctors as well. We are a reliable source
                            for
                            disease-related statistics and data.
                        </p>
                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            You will have a great knowledge about the various diseases spreading in Pakistan with the
                            National Disease Tracking System. Our website is updated properly which provides you with
                            the most recent data. we ensure that you know the spread of any diseases in your area.
                        </p>
                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            One of the most important features of our system is the visuals which demonstrate disease
                            occurrence through graphs and charts. With just a few clicks, you can view the statics of a
                            particular disease in a certain province, specific age group, or even over a specific time.
                            This
                            allows you to analyze patterns and aids in informed decision-making and resource
                            allocation.
                        </p>
                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            Furthermore, our platform enables you to delve deeper into the statistics by providing
                            detailed information about patients with specific diseases throughout Pakistan. Gain
                            valuable
                            insights into the demographics, geographic distribution, and other crucial information for
                            individuals suffering from a particular ailment.
                        </p>


                        <p class="mb-8 text-base text-body-color dark:text-dark-6">
                            Whether you are a healthcare professional seeking accurate data to develop strategies and
                            policies or an individual concerned about a specific disease, the National Disease Tracking
                            System empowers you with comprehensive and reliable information. We aim to support the
                            health sector in effectively and efficiently combating diseases.
                        </p>
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
                    <div class="flex items-center justify-center mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                            All Province
                        </h5>
                    </div>
                    <div class="cursor-pointer w-full py-6 flex flex-col items-center justify-center bg-gray-100 text-theme-primary-400 rounded-md mb-4"
                        id="dateRangeButton">
                        <div class="font-bold" id="provinceChartHeading">{{ $diseases->first()->diagnose }}</div>
                        <input type="hidden" id="first-disease" value="{{ $diseases->first()->id }}">
                        <div class="text-sm text-gray-500">change?</div>
                    </div>



                    <div class="">
                        <div class="flex justify-center items-center w-full">
                            <div class="flex-col items-center justify-center">
                                {{-- <button id="dateRangeButton"
                                    data-dropdown-ignore-click-outside-class="datepicker" type="button"
                                    class="inline-flex items-center text-blue-700 dark:text-blue-600 font-medium hover:underline">
                                    Select Desease
                                    <svg class="w-3 h-3 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 4 4 4-4" />
                                    </svg>
                                </button> --}}
                                <div id="dateRangeDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="p-3" aria-labelledby="dateRangeButton">

                                        <select required name="disease_id" id="disease_id"
                                            onchange="provinceChart(this)"
                                            class="mb-4 wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select disease') }}</option>
                                            @foreach ($diseases as $disease)
                                                <option value="{{ $disease->id }}">{{ __($disease->diagnose) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Line Chart -->
                        <div class="py-6" id="pie-chart">
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
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 6 10">
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
                                            <path stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M5 13V1m0 0L1 5m4-4 4 4" />
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

    <footer class="py-10 md:py-16">

        <div class="container max-w-screen-xl mx-auto px-4">

            <div class="text-center">
                <h1 class="font-medium text-gray-700 text-4xl md:text-5xl mb-5">{{ siteSetting('website_name') }}</h1>

                <p class="font-normal text-gray-400 text-md md:text-lg mb-20">
                    Join us today and stay informed about the prevailing diseases in Pakistan. Together, we can
                    work towards a healthier nation and more targeted interventions. Explore the National
                    Disease Tracking System and access the complete statistics you need to make informed
                    decisions about your health and well-being.
                </p>

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


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        feather.replace();
    </script>
    <script src="{{ asset('admin/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/site/plugins/nice-select2/dist/js/nice-select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
        var options = {
            searchable: true,
        };
        let countrySelectDropdown = NiceSelect.bind(document.getElementById("disease_id"), options);

        let color1 = "#1C64F2";
        let color2 = "#16BDCA";
        let color3 = "#9061F9";
        let color4 = "#1C64F2";
        let provinceChartDiseaseDropdown = null;
        let provinceApexChart = null;
        // set the dropdown menu element
        const $targetEl = document.getElementById('dateRangeDropdown');

        // set the element that trigger the dropdown menu on click
        const $triggerEl = document.getElementById('dateRangeButton');

        // options with default values
        const dropdownOptions = {
            placement: 'bottom',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            delay: 300,
            ignoreClickOutsideClass: false,
            onHide: () => {
                console.log('dropdown has been hidden');
            },
            onShow: () => {
                console.log('dropdown has been shown');
            },
            onToggle: () => {
                console.log('dropdown has been toggled');
            },
        };

        // instance options object
        const instanceOptions = {
            id: 'dateRangeDropdown',
            override: true
        };

        window.addEventListener("load", function() {
            window.initFlowbite()
            provinceChartDiseaseDropdown = new Dropdown($targetEl, $triggerEl, dropdownOptions, instanceOptions);
            console.log(document.getElementById("first-disease"))
            provinceChart(document.getElementById("first-disease"))

        });
        const provinceChart = (elem) => {
            if (!elem.value) {
                return false;
            }
            let value = elem.value;
            var selectedText = $(elem).find("option:selected").text();
            if (selectedText) {
                $("#provinceChartHeading").html(selectedText)
            }
            provinceChartDiseaseDropdown.hide();
            $.ajax({
                type: 'POST',
                url: "{{ route('provinceChart') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: value
                },
                success: function(response) {
                    provinceCreateChart(response)
                }
            });
        }
        const provinceCreateChart = (response) => {
            var dataIdPercentage = response.data;
            var provinceNames = Object.keys(dataIdPercentage);
            var patientCounts = Object.values(dataIdPercentage);

            var getChartOptions = () => {
                return {
                    series: patientCounts,
                    labels: provinceNames,
                    colors: ["#1C64F2", "#16BDCA", "#9061F9", "#f4bd96"],
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
                };
            };
            var getNullChartOptions = () => {

                return {
                    series: [1],
                    colors: ['#f0f0f0'],
                    labels: ['no data'],
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
                                show: false,
                            },
                            size: "100%",
                            dataLabels: {
                                offset: -25
                            }
                        },
                    },
                    dataLabels: {
                        enabled: false,
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
                                return 0;
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
                };
            };
            console.log(dataIdPercentage)
            if (provinceApexChart) {
                if (!response.success) {
                    provinceApexChart.updateOptions(getNullChartOptions());
                    return;
                }
                provinceApexChart.updateOptions(getChartOptions());
            } else {
                if (!response.success) {
                    provinceApexChart = new ApexCharts(document.getElementById("pie-chart"), getNullChartOptions());
                    provinceApexChart.render();
                    return;
                }
                provinceApexChart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions());
                provinceApexChart.render();
            }
        }

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
