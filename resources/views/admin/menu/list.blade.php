<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    {{ __($heading.'s') }}
                </h2>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    @can("$permission-create")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-theme-primary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">{{ __('Create') }}</h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.menu.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-6/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                            for="name">{{ __('Name') }} </label>
                                        <input name="name" required
                                            placeholder="{{ __('enter name and must be unique') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            aria-describedby="name_help" type="text">
                                        <p class="text-theme-primary-100 text-sm dark:text-gray-400">{{ __('e.g: Category or Sub Category') }}</p>
                                        @error('name')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-6/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                            for="icon">{{ __('Font Awesome icon') }} </label>
                                        <input name="icon" type="text" required
                                            placeholder='<i class="fas fa-desktop"></i>'
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            aria-describedby="icon_help">
                                        <p class="text-theme-primary-100 text-sm dark:text-gray-400">{{ __('get icons from here') }} <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank" rel="noopener noreferrer"> Font Awesome 5 <i class="fas fa-external-link-alt ml-1 text-theme-warning-400 dark:text-theme-warning-400"></i></a></p>
                                    </div>
                                    {{-- <div class="w-full lg:w-4/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                            for="menu_id">{{ __('Select Parent Menu') }}</label>
                                        <select name="menu_id"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('No Parent') }}</option>
                                            @foreach ($menus as $menu)
                                                <option value="{{ $menu->id }}"> {{ $menu->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('menu_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-3/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                            for="route_name">{{ __('Route Name') }}</label>
                                        <select name="route_name"
                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('No Route') }}</option>
                                            @foreach ($routes as $key => $route)
                                                @if (str_contains($route->getName(), '.index') || $route->getName() == 'dashboard' || $route->getName() == 'profile')
                                                    <option value="{{ $route->getName() }}"> {{ route($route->getName()) }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('route_name')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div> --}}
                                    <div class="w-full lg:w-6/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                            for="status">{{ __('Select status') }}</label>
                                        <select name="status" required
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Please select any option') }}</option>
                                            @foreach(App\Models\Menu::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('status', 'active') === (string) $key ? 'selected' : '' }}>{{ __($label) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div
                                        class="w-full lg:w-2/12 px-3 lg:mb-3 flex items-end justify-center text-center px-4 mt-2">
                                        <x-primary-button class="d-block px-3 pt-3 w-100 mb-0 hover:bg-theme-primary-300">
                                            <i class="fas fa-plus-square mx-3 text-white"></i>{{ __('create') }}
                                        </x-primary-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan



    @can("$permission-read")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-theme-primary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="h3 py-3">
                                <div class="heading-1 py-3">
                                    <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                        {{ __($heading.'s')}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">{{ __('Name') }} </th>
                                            {{-- <th scope="col" class="px-6 py-3">{{ __('Parent') }} </th>
                                            <th scope="col" class="px-6 py-3">{{ __('Route') }} </th> --}}
                                            <th scope="col" class="px-6 py-3">{{ __('Status') }} </th>
                                            <th scope="col" class="px-6 py-3">{{ __('Created At') }} </th>
                                            @can("$permission-update")
                                            <th scope="col" class="px-6 py-3">{{ __('Actions') }} </th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($menus as $menu)
                                            <tr class="bg-theme-primary-700 border-b border-theme-success-200">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-theme-primary-100 whitespace-nowrap dark:text-theme-primary-100">
                                                    {{ $menu->name }}
                                                </td>
                                                {{-- <td class="px-6 py-4 text-theme-primary-100">
                                                    {{ $menu->parent != null ? $menu->parent?->name : '-' }}
                                                </td>
                                                <td class="px-6 py-4 text-theme-primary-100 ">
                                                    {!! $menu->route_name ? '<a href="'.route($menu->route_name).'" target="_blank" class="font-bold"> '.route($menu->route_name).'<i class="fas fa-external-link-alt mx-3 text-theme-warning-400 dark:text-theme-warning-400"></i> <a/>' : '-' !!}
                                                </td> --}}
                                                <td class="px-6 py-4">
                                                    @if ($menu->status == 'active')
                                                        <span
                                                            class="w-full flex justify-center items-center px-2 py-1 mr-2 text-sm font-medium text-theme-success-800 bg-theme-success-300 rounded dark:bg-theme-success-900 dark:text-theme-success-300">
                                                            <i class="fas fa-check mr-2 text-theme-success-800 dark:text-theme-success-300"></i>
                                                            {{ __('Active') }}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="w-full flex justify-center items-center px-2 py-1 mr-2 text-sm font-medium text-theme-danger-800 bg-theme-danger-300 rounded dark:bg-theme-danger-900 dark:text-theme-danger-300">
                                                            <i class="fas fa-xmark mr-2 text-theme-danger-800 dark:text-theme-danger-300"></i>
                                                            {{ __('Inactive') }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 text-theme-primary-100">
                                                    {{ \Carbon\Carbon::parse($menu->created_at)->toDayDateTimeString() }}
                                                </td>
                                                @can("$permission-update")
                                                <td class="px-6 py-4">
                                                    <x-warning-button
                                                        class="bg-theme-warning-100 hover:bg-theme-danger-900 focus:bg-theme-danger-900 active:bg-theme-danger-600"
                                                        type="button" value="{{ $menu->status }}"
                                                        onclick="openUserModal({{ $menu->id }},'{{ $menu->status }}','{{ $menu->name }}','{{ $menu->icon }}','{{ $menu->menu_id }}','{{ $menu->route_name }}')">
                                                        <i class="fas fa-pen-to-square"></i>
                                                    </x-warning-button>
                                                </td>
                                                @endcan
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                    <tfoot class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">{{ __('Name') }} </th>
                                            {{-- <th scope="col" class="px-6 py-3">{{ __('Parent') }} </th>
                                            <th scope="col" class="px-6 py-3">{{ __('Route') }} </th> --}}
                                            <th scope="col" class="px-6 py-3">{{ __('Status') }} </th>
                                            <th scope="col" class="px-6 py-3">{{ __('Created At') }} </th>
                                            @can("$permission-update")
                                            <th scope="col" class="px-6 py-3">{{ __('Actions') }} </th>
                                            @endcan
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @endcan


    @can("$permission-update")
    <!-- Main modal -->
    <div id="changeStatusModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-theme-primary-700 rounded-lg shadow dark:bg-gray-700">
                <button onclick="closeUserModal()" type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-theme-primary-300 hover:text-theme-primary-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t border-theme-success-200">
                    <h3 class="text-base font-semibold text-theme-primary-100 lg:text-xl dark:text-white">
                        {{ __('Update Menu') }}
                    </h3>
                </div>
                <!-- Modal body -->
                <form action="{{ route('admin.menu.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <div class="px-6">
                        <div class="w-full lg:w-12/12 mb-6 lg:mb-3 my-4 space-y-3">
                            <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                for="name">{{ __('Menu Name') }}  </label>
                            <input name="name" id="name" type="text" required
                                placeholder="{{ __('enter name and must be unique') }}"
                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                aria-describedby="name_help">
                            <p class="text-theme-primary-100 text-sm dark:text-gray-400">{{ __('e.g: Category or Sub Category') }}</p>
                        </div>
                        <div class="w-full lg:w-12/12 mb-6 lg:mb-3 my-4 space-y-3">
                            <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                for="icon">{{ __('Font Awesome icon') }}  </label>
                            <input name="icon" id="icon" type="text" required
                                placeholder='<i class="fas fa-desktop"></i>'
                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                aria-describedby="icon_help">
                            <p class="text-theme-primary-100 text-sm dark:text-gray-400">{{ __('get icons from here') }}  <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank" rel="noopener noreferrer"> {{ __('Font Awesome 5') }} <i class="fas fa-external-link-alt ml-1 text-theme-warning-400 dark:text-theme-warning-400"></i></a></p>
                        </div>
                        {{-- <div class="w-full lg:w-12/12 mb-6 lg:mb-3 my-4 space-y-3">
                            <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                for="menu_id">{{ __('Select Parent Menu') }} </label>
                            <select id="menu_id" name="menu_id"
                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                <option value=""> {{ __('No Parent') }}  </option>
                                @foreach ($menus as $menu)
                                    <option value="{{ $menu->id }}"> {{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        {{-- <div class="w-full lg:w-12/12 mb-6 lg:mb-3 my-4 space-y-3">
                            <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                for="route_name">{{ __('Route Name') }}  </label>
                                <select name="route_name" id="route_name"
                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                    <option value=""> {{ __('No Route') }}  </option>
                                    @foreach ($routes as $key => $route)
                                        @if (str_contains($route->getName(), 'admin.') || $route->getName() == 'dashboard' || $route->getName() == 'profile')
                                            <option value="{{ $route->getName() }}"> {{ $route->getName() }}</option>
                                        @endif
                                    @endforeach

                                    @foreach ($routes as $key => $route)
                                        @if (str_contains($route->getName(), '.index') || $route->getName() == 'dashboard' || $route->getName() == 'profile')
                                            <option value="{{ $route->getName() }}"> {{ route($route->getName()) }}</option>
                                        @endif
                                    @endforeach
                                </select>
                        </div> --}}
                        <ul class="my-4 space-y-3">
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-theme-primary-100 rounded-lg bg-theme-primary-400 border border-theme-success-200 hover:bg-theme-primary-300 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-check mx-3 text-theme-success-100 dark:text-theme-success-300"></i>
                                    <input id="status-active" type="radio" required value="active" name="status"
                                        required
                                        class="w-4 h-4 text-theme-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-primary-500 dark:focus:ring-theme-primary-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-active"
                                        class="w-full py-3 ml-2 text-sm font-medium text-theme-primary-100 dark:text-gray-300">{{ __('Active') }}</label>
                                </span>
                            </li>
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-theme-primary-100 rounded-lg bg-theme-primary-400 border border-theme-success-200 hover:bg-theme-primary-300 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-xmark mx-3 text-theme-danger-500 dark:text-theme-danger-300"></i>
                                    <input id="status-inactive" type="radio" required value="inactive"
                                        name="status" required
                                        class="w-4 h-4 text-theme-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-primary-500 dark:focus:ring-theme-primary-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-inactive"
                                        class="w-full py-3 ml-2 text-sm font-medium text-theme-primary-100 dark:text-gray-300">{{ __('Inactive') }}</label>
                                </span>
                            </li>
                        </ul>
                        <div class="pb-4 space-y-3">
                            <x-primary-button
                                class="w-full justify-center bg-theme-danger-600 hover:bg-theme-danger-500 focus:bg-theme-danger-900 active:bg-theme-danger-600">
                               {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            let modalEl = document.getElementById('changeStatusModal');
            const options = {
                placement: 'center',
                backdrop: 'dynamic',
                backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
                closable: true,
                onHide: () => {
                    // console.log('modal is hidden');
                    document.querySelectorAll('input[type=radio]').forEach(el => el.checked = false);
                },
                onShow: () => {
                    // console.log('modal is shown');
                },
                onToggle: () => {
                    // console.log('modal has been toggled');
                }
            };
            openUserModal = (id, status, name,  icon) => {
                let myModal = new Modal(modalEl, options);
                document.getElementById('id').value = id;
                document.getElementById(`status-${status}`).checked = true;
                document.getElementById('name').value = name;
                document.getElementById('icon').value = icon;
                // document.getElementById('menu_id').value = menu_id;
                // document.getElementById('route_name').value = route_name;
                // console.log(route_name)
                myModal.show();
            }
            closeUserModal = () => {
                let myModal = new Modal(modalEl, options);
                myModal.hide();
                document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.remove());
            }
        </script>
        <script>
            $(document).ready(function() {
                var requiredCheckboxes = $('#changeStatusModal :checkbox[required]');
                requiredCheckboxes.change(function() {
                    if (requiredCheckboxes.is(':checked')) {
                        requiredCheckboxes.removeAttr('required');
                    } else {
                        requiredCheckboxes.attr('required', 'required');
                    }
                });
            });
        </script>
    @endsection
    @endauth

</x-app-layout>
