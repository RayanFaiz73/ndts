@foreach ($MODULES as $key => $menu)
    {{-- @canany(["create-$menu->slug","read-$menu->slug","update-$menu->slug","delete-$menu->slug"]) --}}
    @can($menu->slug)
        @if (count($menu->childrenMenus))

        <button type="button"
            class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown{{$key}}example" data-collapse-toggle="dropdown{{$key}}example">
            {!! $menu->icon!!}
            <span class="flex-1 ml-3 text-left whitespace-nowrap"
                sidebar-toggle-item>
                {{ __($menu->name) }}
            </span>
            <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        <ul id="dropdown{{$key}}example" class="hidden py-2 pl-3 bg-gray-200 dark:bg-gray-700">

            @if ($menu->route_name)
                <li>
                    <a href="{{$menu->route_name ? route($menu->route_name) : null}}"
                        class="flex items-center w-full p-2 text-base font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11">
                        <i class="fas fa-dot-circle mr-2" style="font-size:0.5rem"></i>
                        {{ __($menu->name) }}
                    </a>
                </li>
            @endif
                @foreach ($menu->childrenMenus as $childMenu)
                    @include('components.sidebar-menu-child', ['child_menu' => $childMenu])
                @endforeach
        </ul>
        @else

        <li>
            <a href="{{$menu->route_name ? route($menu->route_name) : null}}"
                class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                {!! $menu->icon!!}
                <span class="ml-3">{{ __($menu->name) }}</span>
            </a>
        </li>
        @endif
    @endcan
    {{-- @endcanany --}}
@endforeach


