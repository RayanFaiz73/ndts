<x-app-layout>
    <x-slot name="header">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-10">
                    <h2 class="text-3xl font-bold text-theme-secondary-100 dark:text-white">
                        {{ __($heading.'s')}}
                    </h2>
                    @can("$permission-read")
                    <div
                        class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <!-- Profile dropdown -->
                        <div class="relative ml-3">
                            <div>
                                <x-primary-link  class="ml-3 text-theme-secondary-100" :href="route('admin.permission.index')">
                                    {{ __('All '.$heading.'s')}}
                                </x-primary-link>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
    </x-slot>
    @can("$permission-create")
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-800">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-secondary-100 dark:text-white">Create {{$heading}}</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.permission.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-12/12 px-3 mb-6 lg:mb-6">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white"
                                            for="name">{{ __('Role Name')}} </label>
                                        <input name="name" required placeholder="{{ __('Enter role name')}}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-gray-300 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            aria-describedby="name_help" type="text">
                                        @error('name')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="flow-root">

                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm text-left text-theme-secondary-100 dark:text-gray-400">
                                            <thead
                                                class="text-xs text-theme-secondary-100 uppercase bg-theme-primary-300 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 rounded-l-lg">
                                                        {{ __('Menu')}}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        {{ __('Create')}}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        {{ __('Read')}}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center">
                                                        {{ __('Update')}}
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center rounded-r-lg">
                                                        {{ __('Delete')}}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @forelse ($menus as $key => $menu)


                                                @if (count($menu->childrenMenus))
                                                    <tr>
                                                        <th colspan="5" scope="col"
                                                        class="px-6 pt-3 text-base font-bold text-theme-secondary-100dark:text-white decoration-theme-primary-500">{{ $menu->name }}
                                                        <span class="text-theme-secondary-100 text-xs">({{ __('Parent')}})</span></th>
                                                    </tr>
                                                    @if($menu->route_name)
                                                        @include('admin.permission.recursive', ['child_menu' => $menu, 'class' => '', 'edit' => false])
                                                    @endif
                                                    @foreach ($menu->childrenMenus as $childMenu)
                                                        @include('admin.permission.recursive', ['child_menu' => $childMenu, 'class' => '', 'edit' => false])
                                                    @endforeach
                                                @else
                                                <tr>
                                                    <th colspan="5" scope="col"
                                                    class="px-6 pt-3 text-base font-bold text-theme-primary-300 dark:text-white decoration-theme-primary-500">{{ $menu->name }}</th>
                                                </tr>
                                                    @include('admin.permission.recursive', ['child_menu' => $menu, 'class' => '', 'edit' => false])
                                                @endif
                                                    {{-- <tr class="bg-white dark:bg-gray-800">
                                                        <th scope="row"
                                                            class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                                            <input type="hidden"
                                                                name="menus[{{ $menu->id }}][menu_id]"
                                                                value="{{ $menu->id }}">
                                                            <label
                                                                class="relative inline-flex items-center cursor-pointer"
                                                                for="{{ $menu->id }}">
                                                                <input type="checkbox" class="sr-only peer"
                                                                    onclick="toggleAll(this,'toggleAll_{{ $menu->id }}')"
                                                                    value="1" id="{{ $menu->id }}">
                                                                <div
                                                                    class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-theme-primary-300 dark:peer-focus:ring-theme-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-theme-primary-600">
                                                                </div>
                                                                <span
                                                                    class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $menu->name }}</span>
                                                            </label>
                                                        </th>
                                                        <td class="px-6 py-2 ">
                                                            <div class="d-flex justify-center">
                                                                <label
                                                                    class="relative inline-flex items-center cursor-pointer"
                                                                    for="create{{ $menu->id }}">
                                                                    <input type="checkbox" class="sr-only peer toggleAll_{{$menu->id}}"
                                                                        name="menus[{{ $menu->id }}][permissions][create]"
                                                                        value="1" id="create{{ $menu->id }}">
                                                                    <div
                                                                        class="toggleAll_{{ $menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-success-600">
                                                                    </div>
                                                                    <span
                                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-2 ">
                                                            <div class="d-flex justify-center">
                                                                <label
                                                                    class="relative inline-flex items-center cursor-pointer"
                                                                    for="read{{ $menu->id }}">
                                                                    <input type="checkbox" class="sr-only peer toggleAll_{{$menu->id}}"
                                                                        name="menus[{{ $menu->id }}][permissions][read]"
                                                                        value="1" id="read{{ $menu->id }}">
                                                                    <div
                                                                        class="toggleAll_{{ $menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-success-600">
                                                                    </div>
                                                                    <span
                                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-2 ">
                                                            <div class="d-flex justify-center">
                                                                <label
                                                                    class="relative inline-flex items-center cursor-pointer"
                                                                    for="update{{ $menu->id }}">
                                                                    <input type="checkbox" class="sr-only peer toggleAll_{{$menu->id}}"
                                                                        name="menus[{{ $menu->id }}][permissions][update]"
                                                                        value="1" id="update{{ $menu->id }}">
                                                                    <div
                                                                        class="toggleAll_{{ $menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-success-600">
                                                                    </div>
                                                                    <span
                                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-2 ">
                                                            <div class="d-flex justify-center">
                                                                <label
                                                                    class="relative inline-flex items-center cursor-pointer"
                                                                    for="delete{{ $menu->id }}">
                                                                    <input type="checkbox" class="sr-only peer toggleAll_{{$menu->id}}"
                                                                        name="menus[{{ $menu->id }}][permissions][delete]"
                                                                        value="1"
                                                                        id="delete{{ $menu->id }}">
                                                                    <div
                                                                        class="toggleAll_{{ $menu->id }} w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-theme-success-300 dark:peer-focus:ring-theme-success-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-theme-success-600">
                                                                    </div>
                                                                    <span
                                                                        class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr> --}}
                                                @empty
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">
                                    <x-primary-button class="hover:bg-theme-primary-300">
                                        {{__('Create')}}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <!-- Custom Functions -->
    <script>
        function toggleAll(elem, className) {
            if ($(elem).prop("checked") == true) {
                console.log("Checkbox is checked.");
                // $('.'+className).attr('checked',true);
                $('.' + className).prop("checked", true);
            } else if ($(elem).prop("checked") == false) {
                console.log("Checkbox is unchecked.");
                // $('.'+className).attr('checked',false);
                $('.' + className).prop("checked", false);
            }
        }
    </script>
    @endsection
    @endcan
</x-app-layout>
