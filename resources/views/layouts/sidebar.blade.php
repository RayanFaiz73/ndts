<aside class="w-96 min-h-screen hidden lg:block sm:min-h-full bg-white dark:bg-gray-800 shadow-lg "
    aria-label="Sidebar">
    <div class="sticky top-0 z-10 px-3 min-h-screen overflow-y-auto">
        <div class="flex items-center justify-center mb-4 h-16 border-b border-gray-100 dark:border-gray-700">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block w-auto fill-current text-gray-800 dark:text-gray-200 rounded-xl" />
                {{--
                <x-application-logo
                    class="block h-12 w-auto fill-current text-gray-800 dark:text-gray-200 rounded-xl" /> --}}
            </a>
        </div>
        <ul class="space-y-2">

            {{-- @include('components.sidebar-menu') --}}
            {{-- @can('permission-read')
            <li>
                <a href="{{route('admin.acl.index')}}"
                    class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fas fa-user"></i>
                    <span class="ml-3">{{ __('Role') }}</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-danger-link
                        class="w-full p-2 text-base font-normal text-theme-danger-900 rounded-lg dark:text-white hover:bg-theme-danger-100 dark:hover:bg-theme-danger-700"
                        :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                        <i class="fas fa-lock mr-2"> </i>
                        {{ __('Log Out') }}
                    </x-danger-link>
                </form>
            </li>
        </ul>
        {{-- <div class="w-48 justify-center mb-4 h-16 border-t bottom-0 absolute border-gray-100 dark:border-gray-700">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-danger-link class="w-full flex justify-center" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <i class="fas fa-lock mr-2"> </i>
                    {{ __('Log Out') }}
                </x-danger-link>
            </form>
        </div> --}}
    </div>
</aside>
