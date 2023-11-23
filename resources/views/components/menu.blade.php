@foreach ($MODULES as $key => $menu)
    @if (count($menu->childrenMenus))
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

        @php
            $class = 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out';
            if(request()->routeIs($menu->route_name)){
                $class = 'inline-flex items-center px-1 pt-1 border-b-2 border-theme-primary-400 dark:border-theme-primary-600 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none focus:border-theme-primary-700 transition duration-150 ease-in-out';
            }
        @endphp

        <button id="dropdown{{ $key }}Link" data-dropdown-toggle="dropdown{{ $key }}"
            class="flex items-center justify-between {{$class}}">
            {{ __($menu->name) }}
            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg></button>
        <div id="dropdown{{ $key }}"
            class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-400"
                aria-labelledby="dropdown{{ $key }}LargeButton">
                @if ($menu->route_name)
                    <li>
                        <a href="{{$menu->route_name ? route($menu->route_name) : null}}"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __($menu->name) }}</a>
                    </li>
                @endif
                <li aria-labelledby="dropdown{{ $key }}Link">
                    @foreach ($menu->childrenMenus as $childMenu)
                        @include('components.menu-child', ['child_menu' => $childMenu])
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    @else
    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="$menu->route_name ? route($menu->route_name) : null" :active="request()->routeIs($menu->route_name)">
            {{ __($menu->name) }}
        </x-nav-link>
    </div>
    @endif
@endforeach


