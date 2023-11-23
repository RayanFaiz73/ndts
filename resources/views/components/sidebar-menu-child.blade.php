
@if ($child_menu->menus)
<li>
    <button type="button"
    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-theme-primary-500 dark:text-white dark:hover:text-theme-primary-500"
    aria-controls="dropdownDouble{{$child_menu->id}}example" data-collapse-toggle="dropdownDouble{{$child_menu->id}}example">
    {!! $child_menu->icon!!}
    <span class="flex-1 ml-3 text-left whitespace-nowrap"
        sidebar-toggle-item>
        {{ __($child_menu->name) }}
    </span>
    <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
    </svg>
    </button>
    <ul id="dropdownDouble{{$child_menu->id}}example" class="hidden py-2 pl-3 space-y-2">

        <li>
            <a href="{{ $child_menu->route_name ? route($child_menu->route_name) : null }}"
                class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:text-theme-primary-500 dark:text-white dark:hover:text-theme-primary-500">
                <i class="fas fa-dot-circle mr-2" style="font-size:0.5rem"></i>
                {{ __($child_menu->name) }}
            </a>
        </li>

        {{-- <li> --}}
            @foreach ($child_menu->menus as $childMenu)
                @include('components.sidebar-menu-child', ['child_menu' => $childMenu])
            @endforeach
        {{-- </li> --}}
    </ul>
</li>
    {{-- <button id="doubleDropdown{{ $child_menu->id }}Button" data-dropdown-toggle="doubleDropdown{{ $child_menu->id }}"
        data-dropdown-placement="right-start" type="button"
        class="flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
        {{ __($child_menu->name) }}
        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
        </svg>
    </button>

    <div id="doubleDropdown{{ $child_menu->id }}"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
            aria-labelledby="doubleDropdown{{ $child_menu->id }}Button">
            <li>
                <a href="{{ $child_menu->route_name ? route($child_menu->route_name) : null }}"
                    class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">{{ __($child_menu->name) }}</a>
            </li>

            <ul>
                @foreach ($child_menu->menus as $childMenu)
                    @include('components.sidebar-menu-child', ['child_menu' => $childMenu])
                @endforeach
            </ul>
        </ul>
    </div> --}}
@else

<li>
    <a href="{{$child_menu->route_name ? route($child_menu->route_name) : null}}"
        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
        <i class="fas fa-dot-circle mr-2" style="font-size:0.5rem"></i>
        {{ __($child_menu->name) }}
    </a>
</li>
    {{-- <li>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="$child_menu->route_name ? route($child_menu->route_name) : null" :active="request()->routeIs($child_menu->route_name)">
                {{ __($child_menu->name) }}
            </x-nav-link>
        </div>
    </li> --}}
@endif
