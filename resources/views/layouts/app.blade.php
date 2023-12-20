<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ siteSetting('website_name') ?? 'title not set' }}</title>


    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('favicons/apple-touch-icon.png') }}" sizes="180x180">
    <link rel="icon" href="{{ asset('favicons/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('favicons/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('favicons/safari-pinned-tab.svg') }}" color="#7952b3">
    <link rel="icon" href="{{ asset('favicons/favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.tailwindcss.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/site/css/cropper.min.css') }}" rel="stylesheet" />

    <script src="{{ asset('assets/site/plugins/tinymceNew/js/tinymce/tinymce.min.js') }}"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/site/plugins/dropzone/dropzone.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    @yield('styles')
    <style>
        select:not([size]) {
            background-image: url("data:image/svg+xml,%3csvg aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 10 6'%3e%3cpath stroke='%23dbdbdb' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m1 1 4 4 4-4'/%3e%3c/svg%3e")
        }

        .apexcharts-canvas .apexcharts-legend-text {
            color: #fff !important;
        }

        .apexcharts-canvas .apexcharts-legend-text:not(.apexcharts-inactive-legend):hover {
            color: #a5a5a5 !important;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-theme-primary-500 dark:bg-gray-900">
        <div class="flex ">
            <aside
                class="w-96 min-h-screen hidden lg:block sm:min-h-full bg-theme-primary-700 dark:bg-gray-800 shadow-lg "
                aria-label="Sidebar">
                <div class="sticky top-0 z-10 px-3 min-h-screen overflow-y-auto">
                    <div
                        class="flex items-center justify-center mb-4 h-28 border-b border-theme-success-200 dark:border-gray-700">
                        <a href="{{ route('dashboard') }}">
                            <img src="{{ Storage::disk('site')->url(siteSetting('logo')) }}"
                                class="block h-24  fill-current text-gray-400 dark:text-gray-200 rounded-xl" />
                        </a>
                    </div>
                    <ul class="space-y-2">
                        @can("Dashboard-read")
                        <li>
                            <a href="{{route('dashboard')}}" class="{{ request()->routeIs('dashboard') ? "
                                bg-theme-primary-300 text-theme-primary-100" : "text-theme-primary-100" }} flex
                                items-center p-2 rounded-lg dark:text-white hover:bg-theme-primary-400
                                dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 22 21">
                                    <path
                                        d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                    <path
                                        d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                                </svg>
                                <span class="ms-3">Dashboard</span>
                            </a>
                        </li>
                        @endcan
                        @can("Menu-read")
                        <li>
                            <a href="{{route('admin.menu.index')}}" class="{{ request()->routeIs('admin.menu.index') ? "
                                bg-theme-primary-300 text-theme-primary-100" : "text-theme-primary-100" }} flex
                                items-center p-2 rounded-lg dark:text-white hover:bg-theme-primary-400
                                dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 17 14">
                                    <path
                                        d="M16 2H1a1 1 0 0 1 0-2h15a1 1 0 1 1 0 2Zm0 6H1a1 1 0 0 1 0-2h15a1 1 0 1 1 0 2Zm0 6H1a1 1 0 0 1 0-2h15a1 1 0 0 1 0 2Z">
                                    </path>
                                </svg>
                                <span class="ms-3">Menu</span>
                            </a>
                        </li>
                        @endcan
                        @can("Permission-read")
                        <li>
                            <a href="{{route('admin.permission.index')}}"
                                class="{{ request()->routeIs('admin.permission.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M5 11.424V1a1 1 0 1 0-2 0v10.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.228 3.228 0 0 0 0-6.152ZM19.25 14.5A3.243 3.243 0 0 0 17 11.424V1a1 1 0 0 0-2 0v10.424a3.227 3.227 0 0 0 0 6.152V19a1 1 0 1 0 2 0v-1.424a3.243 3.243 0 0 0 2.25-3.076Zm-6-9A3.243 3.243 0 0 0 11 2.424V1a1 1 0 0 0-2 0v1.424a3.228 3.228 0 0 0 0 6.152V19a1 1 0 1 0 2 0V8.576A3.243 3.243 0 0 0 13.25 5.5Z">
                                    </path>
                                </svg>
                                <span class="ms-3">Permission</span>
                            </a>
                        </li>
                        @endcan
                        @can("Province-read")
                        <li>
                            <a href="{{route('admin.provinces.index')}}"
                                class="{{ request()->routeIs('admin.provinces.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 0 19 9.5 9.5 0 0 0 0-19ZM8.374 17.4a7.6 7.6 0 0 1-5.9-7.4c0-.83.137-1.655.406-2.441l.239.019a3.887 3.887 0 0 1 2.082 2.5 4.1 4.1 0 0 0 2.441 2.8c1.148.522 1.389 2.007.732 4.522Zm3.6-8.829a.997.997 0 0 0-.027-.225 5.456 5.456 0 0 0-2.811-3.662c-.832-.527-1.347-.854-1.486-1.89a7.584 7.584 0 0 1 8.364 2.47c-1.387.208-2.14 2.237-2.14 3.307a1.187 1.187 0 0 1-1.9 0Zm1.626 8.053-.671-2.013a1.9 1.9 0 0 1 1.771-1.757l2.032.619a7.553 7.553 0 0 1-3.132 3.151Z" />
                                </svg>
                                <span class="ms-3">Province</span>
                            </a>
                        </li>
                        @endcan
                        @can("Hospital-read")
                        <li>
                            <a href="{{route('admin.hospitals.index')}}"
                                class="{{ request()->routeIs('admin.hospitals.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 18 18">
                                    <path
                                        d="M17 16h-1V2a1 1 0 1 0 0-2H2a1 1 0 0 0 0 2v14H1a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM5 4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V4Zm0 5V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1Zm6 7H7v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm2-7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Zm0-4a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1Z" />
                                </svg>
                                <span class="ms-3">Hospital</span>
                            </a>
                        </li>
                        @endcan
                        @can("Staff-read")
                        <li>
                            <a href="{{route('admin.data-operator.index')}}"
                                class="{{ request()->routeIs('admin.data-operator.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 18">
                                    <path
                                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                                </svg>
                                <span class="ms-3">Data Operator</span>
                            </a>
                        </li>
                        @endcan
                        @can("Disease-read")
                        <li>
                            <a href="{{route('admin.diseases.index')}}"
                                class="{{ request()->routeIs('admin.diseases.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9 19V.352A3.451 3.451 0 0 0 7.5 0a3.5 3.5 0 0 0-3.261 2.238A3.5 3.5 0 0 0 2.04 6.015a3.518 3.518 0 0 0-.766 1.128c-.042.1-.064.209-.1.313a3.34 3.34 0 0 0-.106.344 3.463 3.463 0 0 0 .02 1.468A4.016 4.016 0 0 0 .3 10.5l-.015.036a3.861 3.861 0 0 0-.216.779A3.968 3.968 0 0 0 0 12a4.032 4.032 0 0 0 .107.889 4 4 0 0 0 .2.659c.006.014.015.027.021.041a3.85 3.85 0 0 0 .417.727c.105.146.219.284.342.415.072.076.148.146.225.216.1.091.205.179.315.26.11.081.2.14.308.2.02.013.039.028.059.04v.053a3.506 3.506 0 0 0 3.03 3.469 3.426 3.426 0 0 0 4.154.577A.972.972 0 0 1 9 19Zm10.934-7.68a3.956 3.956 0 0 0-.215-.779l-.017-.038a4.016 4.016 0 0 0-.79-1.235 3.417 3.417 0 0 0 .017-1.468 3.387 3.387 0 0 0-.1-.333c-.034-.108-.057-.22-.1-.324a3.517 3.517 0 0 0-.766-1.128 3.5 3.5 0 0 0-2.202-3.777A3.5 3.5 0 0 0 12.5 0a3.451 3.451 0 0 0-1.5.352V19a.972.972 0 0 1-.184.546 3.426 3.426 0 0 0 4.154-.577A3.506 3.506 0 0 0 18 15.5v-.049c.02-.012.039-.027.059-.04.106-.064.208-.13.308-.2s.214-.169.315-.26c.077-.07.153-.14.225-.216a4.007 4.007 0 0 0 .459-.588c.115-.176.215-.361.3-.554.006-.014.015-.027.021-.041.087-.213.156-.434.205-.659.013-.057.024-.115.035-.173.046-.237.07-.478.073-.72a3.948 3.948 0 0 0-.066-.68Z">
                                    </path>
                                </svg>
                                <span class="ms-3">Disease</span>
                            </a>
                        </li>
                        @endcan
                        @can("Patient-read")
                        <li>
                            <a href="{{route('admin.patients.index')}}"
                                class="{{ request()->routeIs('admin.patients.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4H1m3 4H1m3 4H1m3 4H1m6.071.286a3.429 3.429 0 1 1 6.858 0M4 1h12a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Zm9 6.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z">
                                    </path>
                                </svg>
                                <span class="ms-3">Patient</span>
                            </a>
                        </li>
                        @endcan

                        @can("Setting-read")
                        <li>
                            <a href="{{route('admin.setting.index')}}"
                                class="{{ request()->routeIs('admin.setting.index') ? " bg-theme-primary-300
                                text-theme-primary-100" : "text-theme-primary-100" }} flex items-center p-2 rounded-lg
                                dark:text-white hover:bg-theme-primary-400 dark:hover:bg-gray-700 group">
                                <svg class="w-5 h-5 transition duration-75 dark:text-gray-400 group-hover:text-theme-primary-100 dark:group-hover:text-white"
                                    aria-hidden="true" viewBox="0 0 20 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.5 8C5.80777 8 5.13108 7.79473 4.55551 7.41015C3.97993 7.02556 3.53133 6.47893 3.26642 5.83939C3.00152 5.19985 2.9322 4.49612 3.06725 3.81719C3.2023 3.13825 3.53564 2.51461 4.02513 2.02513C4.51461 1.53564 5.13825 1.2023 5.81719 1.06725C6.49612 0.932205 7.19985 1.00152 7.83939 1.26642C8.47893 1.53133 9.02556 1.97993 9.41015 2.55551C9.79473 3.13108 10 3.80777 10 4.5"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M6.5 17H1V15C1 13.9391 1.42143 12.9217 2.17157 12.1716C2.92172 11.4214 3.93913 11 5 11"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M19.5 11H18.38C18.2672 10.5081 18.0714 10.0391 17.801 9.613L18.601 8.818C18.6947 8.72424 18.7474 8.59708 18.7474 8.4645C18.7474 8.33192 18.6947 8.20476 18.601 8.111L17.894 7.404C17.8002 7.31026 17.6731 7.25761 17.5405 7.25761C17.4079 7.25761 17.2808 7.31026 17.187 7.404L16.392 8.204C15.9647 7.93136 15.4939 7.73384 15 7.62V6.5C15 6.36739 14.9473 6.24021 14.8536 6.14645C14.7598 6.05268 14.6326 6 14.5 6H13.5C13.3674 6 13.2402 6.05268 13.1464 6.14645C13.0527 6.24021 13 6.36739 13 6.5V7.62C12.5081 7.73283 12.0391 7.92863 11.613 8.199L10.818 7.404C10.7242 7.31026 10.5971 7.25761 10.4645 7.25761C10.3319 7.25761 10.2048 7.31026 10.111 7.404L9.404 8.111C9.31026 8.20476 9.25761 8.33192 9.25761 8.4645C9.25761 8.59708 9.31026 8.72424 9.404 8.818L10.204 9.618C9.9324 10.0422 9.73492 10.5096 9.62 11H8.5C8.36739 11 8.24021 11.0527 8.14645 11.1464C8.05268 11.2402 8 11.3674 8 11.5V12.5C8 12.6326 8.05268 12.7598 8.14645 12.8536C8.24021 12.9473 8.36739 13 8.5 13H9.62C9.73283 13.4919 9.92863 13.9609 10.199 14.387L9.404 15.182C9.31026 15.2758 9.25761 15.4029 9.25761 15.5355C9.25761 15.6681 9.31026 15.7952 9.404 15.889L10.111 16.596C10.2048 16.6897 10.3319 16.7424 10.4645 16.7424C10.5971 16.7424 10.7242 16.6897 10.818 16.596L11.618 15.796C12.0422 16.0676 12.5096 16.2651 13 16.38V17.5C13 17.6326 13.0527 17.7598 13.1464 17.8536C13.2402 17.9473 13.3674 18 13.5 18H14.5C14.6326 18 14.7598 17.9473 14.8536 17.8536C14.9473 17.7598 15 17.6326 15 17.5V16.38C15.4919 16.2672 15.9609 16.0714 16.387 15.801L17.182 16.601C17.2758 16.6947 17.4029 16.7474 17.5355 16.7474C17.6681 16.7474 17.7952 16.6947 17.889 16.601L18.596 15.894C18.6897 15.8002 18.7424 15.6731 18.7424 15.5405C18.7424 15.4079 18.6897 15.2808 18.596 15.187L17.796 14.392C18.0686 13.9647 18.2662 13.4939 18.38 13H19.5C19.6326 13 19.7598 12.9473 19.8536 12.8536C19.9473 12.7598 20 12.6326 20 12.5V11.5C20 11.3674 19.9473 11.2402 19.8536 11.1464C19.7598 11.0527 19.6326 11 19.5 11ZM14 14.5C13.5055 14.5 13.0222 14.3534 12.6111 14.0787C12.2 13.804 11.8795 13.4135 11.6903 12.9567C11.5011 12.4999 11.4516 11.9972 11.548 11.5123C11.6445 11.0273 11.8826 10.5819 12.2322 10.2322C12.5819 9.8826 13.0273 9.6445 13.5123 9.54804C13.9972 9.45157 14.4999 9.50108 14.9567 9.6903C15.4135 9.87952 15.804 10.2 16.0787 10.6111C16.3534 11.0222 16.5 11.5055 16.5 12C16.5 12.663 16.2366 13.2989 15.7678 13.7678C15.2989 14.2366 14.663 14.5 14 14.5Z"
                                        fill="currentColor" />
                                </svg>
                                <span class="ms-3">Setting</span>
                            </a>
                        </li>
                        @endcan
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-danger-link
                                    class="w-full p-2 text-base font-normal text-theme-danger-100 rounded-lg dark:text-white hover:bg-theme-danger-100 dark:hover:bg-theme-danger-500"
                                    :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    <i class="fas fa-lock mr-2"> </i>
                                    {{ __('Log Out') }}
                                </x-danger-link>
                            </form>
                        </li>
                    </ul>
                </div>
            </aside>
            <div class="block w-full">
                <div class="sticky top-0 z-10">
                    @include('layouts.navigation')
                    <!-- Page Heading -->
                    @if (isset($header))
                    <header class="x-slot bg-theme-primary-700 dark:bg-gray-800 shadow-lg">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                            @if (Session::has('msg') || Session::has('success'))
                            <div id="successMsg"
                                class="flex items-center p-4 mt-4 text-white rounded-lg bg-theme-success-200 dark:bg-gray-600 dark:text-theme-success-400"
                                role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">{{ __('Info') }}</span>
                                <div class="ml-3 text-sm font-medium">
                                    <strong>{{ __('Success!') }}</strong> {!! Session::get('msg') !!}{!!
                                    Session::get('success') !!}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 bg-theme-success-200 text-theme-success-500 rounded-lg focus:ring-2 focus:ring-theme-success-400 p-1.5 hover:bg-theme-success-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-theme-success-400 dark:hover:bg-gray-700"
                                    data-dismiss-target="#successMsg" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>
                            @endif

                            @if ($errors->any())
                            <div id="alertContent"
                                class="p-4 my-2 text-theme-danger-800 border border-theme-danger-300 rounded-lg bg-theme-danger-200 dark:bg-gray-600 dark:text-theme-danger-400 dark:border-theme-danger-800"
                                role="alert">
                                <div class="flex items-center">
                                    <svg class="flex-shrink-0 w-4 h-4 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="sr-only">{{ __('Info') }}</span>
                                    <h3 class="text-lg font-medium">{{ __('Error!') }}</h3>
                                </div>
                                <div class="mt-2 mb-4 text-sm">
                                    <span class="font-medium">{{ __('Ensure that these requirements are met:') }}</span>
                                    <ul class="mt-1.5 ml-4 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                        <li>{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="flex">
                                    <button type="button"
                                        class="text-theme-danger-800 bg-transparent border border-theme-danger-800 hover:bg-theme-danger-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-theme-danger-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-theme-danger-600 dark:border-theme-danger-600 dark:text-theme-danger-500 dark:hover:text-white dark:focus:ring-theme-danger-800"
                                        data-dismiss-target="#alertContent" aria-label="Close">
                                        {{ __('Dismiss') }}
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </header>
                    @endif

                </div>
                <main>
                    {{ $slot }}
            </div>
            </main>
        </div>
    </div>

    <div id="featureModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow-lg dark:bg-gray-700">
                <button onclick="closeFeatureModal()" type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        {{ __('Set Image') }}
                    </h3>
                </div>
                <div class="text-center p-2 flex-auto justify-center">

                    <p class="text-sm text-gray-500 px-4 featureModalHeading">{{ __('Do you really want to delete your
                        account?
                        This process cannot be undone') }}</p>
                    <div class=" mb-8">
                        <img id="imageInModal" src="" alt="your image" class="img-fluid" />
                    </div>
                </div>
                <div class="p-3  mt-2 text-center space-x-4 lg:block">
                    <x-primary-button
                        class="mb-2 lg:mb-3 bg-dark px-5 py-2 text-sm shadow-lg font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-theme-primary-400"
                        type="button" onclick="closeFeatureModal()">
                        {{ __('Set') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/site/js/cropper.min.js') }}"></script>
    <script src="{{ asset('assets/site/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('assets/site/js/dropzone.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


    <!-- BEGIN: DATATABLE JS-->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    {{-- <script src="{{ asset('admin/app-assets/vendors/js/extensions/moment.min.js') }}"></script> --}}
    <script src="{{ asset('admin/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
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
    </script>
    @yield('modal')
    @yield('scripts')
</body>

</html>
