
@if ($child_menu->menus)

    <button id="doubleDropdown{{ $child_menu->id }}Button" data-dropdown-toggle="doubleDropdown{{ $child_menu->id }}"
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
                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __($child_menu->name) }}</a>
            </li>

            <ul>
                @foreach ($child_menu->menus as $childMenu)
                    @include('components.menu-child', ['child_menu' => $childMenu])
                @endforeach
            </ul>
        </ul>
    </div>
@else
    <li>

        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="$child_menu->route_name ? route($child_menu->route_name) : null" :active="request()->routeIs($child_menu->route_name)">
                {{ __($child_menu->name) }}
            </x-nav-link>
        </div>
    </li>
@endif
