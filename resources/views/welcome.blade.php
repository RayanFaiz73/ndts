<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-wiFdth, initial-scale=1.0">
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

            <nav class="flex items-center justify-between">
                <img class="h-20" src="{{ Storage::disk('site')->url(siteSetting('logo')) }}" alt="Logo">
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

        </div>
    </section>
    <!-- ====== About Section Start -->
    <section class="py-10 md:py-16">
        <div class="container max-w-screen-xl mx-auto px-4">
            <div class="flex flex-wrap items-center justify-between">

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
                    </div>
                </div>
                <div class="w-full px-4 lg:w-6/12">
                    <div class="flex items-center -mx-3 sm:-mx-4">
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="py-4 sm:py-4">
                                <img src="{{ asset('site/assets/image/1.gif') }}" alt="" class="w-full rounded-2xl" />
                            </div>
                            <div class="py-4 sm:py-4">
                                <img src="{{ asset('site/assets/image/2.gif') }}" alt="" class="w-full rounded-2xl" />
                            </div>
                        </div>
                        <div class="w-full px-3 sm:px-4 xl:w-1/2">
                            <div class="relative z-10 my-4">
                                <img src="{{ asset('site/assets/image/3.gif') }}" alt="" class="w-full rounded-2xl" />
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
            </div>
        </div>
    </section>
    <!-- ====== About Section End -->
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
                <div class="w-full px-4 lg:w-1/2">
                    <div class="mt-10 lg:mt-0">
                        <span class="block mb-4 text-lg font-semibold text-primary">
                            NDTS
                        </span>
                        <h2 class="mb-5 text-3xl font-bold text-dark dark:text-white sm:text-[40px]/[48px]">
                            {{ siteSetting('website_name') }}
                        </h2>
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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <div class="bg-gray-50 px-8 py-10 rounded-md mb-2">
                    <div class="flex items-center justify-center mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                            All Province
                        </h5>
                    </div>
                    <div class="cursor-pointer w-full py-6 flex flex-col items-center justify-center bg-gray-100 text-theme-primary-400 rounded-md mb-4"
                        id="firstChartButton">
                        <div class="font-bold" id="provinceChartHeading">{{ $diseases->first()->diagnose }}</div>
                        <input type="hidden" id="first-disease" value="{{ $diseases->first()->id }}">
                        <div class="text-sm text-gray-500">change?</div>
                    </div>
                    <div class="">
                        <div class="flex justify-center items-center w-full">
                            <div class="flex-col items-center justify-center">
                                <div id="firstChartDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="p-3" aria-labelledby="firstChartButton">
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
                    <div class="flex items-center justify-center mb-4">
                        <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">
                            Diseases in province
                        </h5>
                    </div>
                    <div class="cursor-pointer w-full py-6 flex flex-col items-center justify-center bg-gray-100 text-theme-primary-400 rounded-md mb-4"
                        id="secondChartButton">
                        <div class="font-bold" id="provinceSingleChartHeading">{{ $diseases->first()->diagnose }}</div>
                        <div class="text-sm text-gray-500">change?</div>
                    </div>

                    <div class="">
                        <div class="flex justify-center items-center w-full">
                            <div class="flex-col items-center justify-center">
                                <div id="secondChartDropdown"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="p-3" aria-labelledby="secondChartButton">

                                        <div
                                            class="flex flex-col justify-between border-gray-200 border-b dark:border-gray-700 pb-3">
                                            <div class="w-full px-3 mb-6 lg:mb-3" id="province_id_div">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-theme-primary-500 dark:text-white">
                                                    {{ __('Province') }}
                                                </label>
                                                <select required name="state_id_2" id="state_id_2"
                                                    class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                    @foreach ($states as $key => $state )
                                                    <option value="{{$state->id}}" @if($key==0) selected @endif>{{
                                                        $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="w-full px-3 mb-6 lg:mb-3" id="disease_id_div">
                                                <label
                                                    class="block mb-2 text-sm font-medium text-theme-primary-500 dark:text-white">
                                                    {{ __('Disease') }}
                                                </label>
                                                <select required name="disease_id_2" id="disease_id_2" multiple
                                                    class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                    <option value="">{{ __('Select Option') }}</option>
                                                    @foreach ($diseases as $dKey => $disease)
                                                    <option value="{{ $disease->id }}" @if($dKey==0 || $dKey==1 ||
                                                        $dKey==2) selected @endif>{{ __($disease->diagnose) }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Line Chart -->
                        <div class="py-6" id="bar-chart">
                        </div>

                        <div class="w-full">
                            <div class="rounded-lg grid grid-cols-3 bg-yellow-50 p-4">
                                <dl>
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Male</dt>
                                    <dd class="leading-none text-xl font-bold text-green-500 dark:text-green-400"
                                        id="male_count">5</dd>
                                </dl>
                                <dl>
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Female</dt>
                                    <dd class="leading-none text-xl font-bold text-red-600 dark:text-red-500"
                                        id="female_count">
                                        4</dd>
                                </dl>
                                <dl>
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400 pb-1">Other</dt>
                                    <dd class="leading-none text-xl font-bold text-theme-warning-500 dark:text-red-500"
                                        id="other_count">
                                        4</dd>
                                </dl>
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
                <h1 class="font-medium text-gray-700 text-4xl md:text-5xl mb-5">{{ siteSetting('website_heading') }}
                </h1>

                <p class="font-normal text-gray-400 text-md md:text-lg mb-20">
                    Join us today and stay informed about the prevailing diseases in Pakistan. Together, we can
                    work towards a healthier nation and more targeted interventions. Explore the National
                    Disease Tracking System and access the complete statistics you need to make informed
                    decisions about your health and well-being.
                </p>
            </div>

        </div>

    </footer>


    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossor igin="anonymous"></script>

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
        let stateSelectDropdown = NiceSelect.bind(document.getElementById("state_id_2"), options);
        let diseaseSelectDropdown = NiceSelect.bind(document.getElementById("disease_id_2"), options);

        let color1 = "#1C64F2";
        let color2 = "#16BDCA";
        let color3 = "#9061F9";
        let color4 = "#1C64F2";
        let firstChartDropdown = null;
        let secondChartDropdown = null;
        let provinceApexChart = null;
        let provinceAndDiseaseApexChart = null;
        const $firstTargetEl = document.getElementById('firstChartDropdown');
        const $firstTriggerEl = document.getElementById('firstChartButton');
        const $secondTargetEl = document.getElementById('secondChartDropdown');
        const $secondTriggerEl = document.getElementById('secondChartButton');

        // options with default values
        const dropdownOptions = {
            placement: 'top',
            triggerType: 'click',
            offsetSkidding: 0,
            offsetDistance: 10,
            delay: 300,
            ignoreClickOutsideClass: false,
            onHide: () => {
            },
            onShow: () => {
            },
            onToggle: () => {
            },
        };

        // instance options object
        const firstInstanceOptions = {
            id: 'firstChartDropdown',
            override: true
        };
        const secondInstanceOptions = {
            id: 'secondChartDropdown',
            override: true
        };

        window.addEventListener("load", function() {
            window.initFlowbite()
            firstChartDropdown = new Dropdown($firstTargetEl, $firstTriggerEl, dropdownOptions, firstInstanceOptions);
            secondChartDropdown = new Dropdown($secondTargetEl, $secondTriggerEl, dropdownOptions, secondInstanceOptions);
            provinceChart(document.getElementById("first-disease"))
            let provinceId = $('#state_id_2').val();
            let diseaseIds = $('#disease_id_2').val();
            sendDataToController(provinceId,diseaseIds);

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
            firstChartDropdown.hide();
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

        $('#state_id_2, #disease_id_2').change(function () {
            let provinceId = $('#state_id_2').val();
            let diseaseIds = $('#disease_id_2').val();
            if (provinceId !== null && diseaseIds.length > 0) {
                sendDataToController(provinceId,diseaseIds);
            }
        });

        function sendDataToController(provinceId,diseaseIds) {
            $.ajax({
                type: 'POST',
                url: "{{ route('provinceAndDiseaseChart') }}",
                data: {
                    _token: '{{ csrf_token() }}',
                    provinceId: provinceId,
                    diseaseId: diseaseIds
                },
                success: function (response) {
                    $('#male_count').text(response.data.total_males);
                    $('#female_count').text(response.data.total_females);
                    $('#other_count').text(response.data.total_others);
                    provinceAndDiseasesCreateChart(response);
                },
                error: function (xhr, status, error) {
                    console.error('Error sending data to controller:', error);
                }
            });
        }

        function provinceAndDiseasesCreateChart(data) {
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
                },
                xaxis: {
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
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
            if(provinceAndDiseaseApexChart){
                provinceAndDiseaseApexChart.updateOptions(options);

            } else {
                provinceAndDiseaseApexChart = new ApexCharts(document.getElementById("bar-chart"), options);
                provinceAndDiseaseApexChart.render();
            }

        }

    </script>

</body>

</html>
