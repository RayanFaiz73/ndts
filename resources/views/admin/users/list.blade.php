<x-app-layout>
    <x-slot name="header">

        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-800 dark:text-white">
                    {{ __($heading.'s')}}
                </h2>
                @can("$permission-create")
                <div class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.user.create')">
                                {{ __('Create '.$heading) }}
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </x-slot>

    @can("$permission-read")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-800 dark:text-white">
                                    {{ __($heading.'s')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">


                            <div class="mb-4">
                                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400"
                                    id="tabExample" role="tablist">
                                    @if(Auth::user()?->roles->first()->name == "Admin" && Auth::user()?->roles->first()->id == 1)
                                    <li class="w-full" role="presentation">
                                        <button
                                            class="text-lg font-extrabold @if ($firstCol == 'Admin') rounded-l-lg @endif @if ($lastCol == 'Admin') rounded-r-lg @endif inline-block w-full text-white p-4 bg-theme-primary-600 hover:bg-theme-primary-500 dark:hover:text-white dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-900"
                                            id="profile-tab-example" type="button" role="tab"
                                            aria-controls="profile-example" aria-selected="false">{{ __('Admins') }}</button>
                                    </li>
                                    <li class="w-full" role="presentation">
                                        <button
                                            class="text-lg font-extrabold @if ($firstCol == 'Manager') rounded-l-lg @endif @if ($lastCol == 'Manager') rounded-r-lg @endif iinline-block w-full text-white p-4 bg-theme-primary-600 hover:bg-theme-primary-500 dark:hover:text-white dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-900"
                                            id="dashboard-tab-example" type="button" role="tab"
                                            aria-controls="dashboard-example" aria-selected="false">{{ __('Managers') }}</button>
                                    </li>
                                    @endif
                                    @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2)
                                    <li class="w-full" role="presentation">
                                        <button
                                            class="text-lg font-extrabold @if ($firstCol == 'Client') rounded-l-lg @endif @if ($lastCol == 'Client') rounded-r-lg @endif iinline-block w-full text-white p-4 bg-theme-primary-600 hover:bg-theme-primary-500 dark:hover:text-white dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-900"
                                            id="settings-tab-example" type="button" role="tab"
                                            aria-controls="settings-example" aria-selected="false">{{ __('Clients') }}</button>
                                    </li>
                                    @endif
                                    @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2 || Auth::user()?->roles->first()->id == 3)
                                    <li class="w-full" role="presentation">
                                        <button
                                            class="text-lg font-extrabold @if ($firstCol == 'User') rounded-l-lg @endif @if ($lastCol == 'User') rounded-r-lg @endif iinline-block w-full text-white p-4 bg-theme-primary-600 hover:bg-theme-primary-500 dark:hover:text-white dark:hover:text-white dark:bg-gray-700 dark:hover:bg-gray-900"
                                            id="contacts-tab-example" type="button" role="tab"
                                            aria-controls="contacts-example" aria-selected="false">{{ __('Users') }}</button>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                            <div id="tabContentExample">
                                @if(Auth::user()?->roles->first()->name == "Admin" && Auth::user()?->roles->first()->id == 1)
                                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="profile-example"
                                    role="tabpanel" aria-labelledby="profile-tab-example">

                                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                            <thead class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($admins as $user)
                                                    @include('admin.users.row', ['user' => $user, 'permission' => $permission])
                                                @empty
                                                <tr class="bg-theme-primary-500 border-b border-theme-primary-400">
                                                    <td class="px-6 py-4" colspan="6"> {{ __('No records found') }}...</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard-example"
                                    role="tabpanel" aria-labelledby="dashboard-tab-example">

                                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                            <thead class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Admin') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($managers as $user)
                                                    @include('admin.users.row-user', ['user' => $user, 'permission' => $permission])
                                                @empty
                                                    <tr class="bg-theme-primary-500 border-b border-theme-primary-400">
                                                        <td class="px-6 py-4" colspan="7"> {{ __('No records found')}}...</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Admin') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2)
                                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="settings-example"
                                    role="tabpanel" aria-labelledby="settings-tab-example">

                                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                            <thead class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Manager') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($clients as $user)
                                                    @include('admin.users.row-user', ['user' => $user, 'permission' => $permission])
                                                @empty
                                                <tr class="bg-theme-primary-500 border-b border-theme-primary-400">
                                                    <td class="px-6 py-4" colspan="7"> {{ __('No records found')}}...</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Manager') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                @endif
                                @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2 || Auth::user()?->roles->first()->id == 3)
                                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts-example"
                                    role="tabpanel" aria-labelledby="contacts-tab-example">

                                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                            <thead class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Client') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $user)
                                                    @include('admin.users.row-user', ['user' => $user, 'permission' => $permission])
                                                @empty
                                                <tr class="bg-theme-primary-500 border-b border-theme-primary-400">
                                                    <td class="px-6 py-4" colspan="7"> {{ __('No records found')}}...</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                            <tfoot class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                                <tr>
                                                    <th scope="col" class="px-3 py-3 w-1/5">{{ __('User') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Client') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Role')}}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/12">{{ __('Verified') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Status') }}</th>
                                                    <th scope="col" class="px-3 py-3 w-1/6">{{ __('Created At') }}</th>
                                                    @can("$permission-update")
                                                    <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Actions') }}</th>
                                                    @endcan
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                @endif
                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    @endcan


    <!-- Main modal -->
    <div id="changeStatusModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button onclick="closeUserModal()" type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        {{ __('Change Status') }}
                    </h3>
                </div>
                <!-- Modal body -->
                <form action="{{ route('admin.user.status') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="user-id" value="">
                    <div class="p-6">
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ __('Only approved user can able to login.') }}
                        </p>
                        <ul class="my-4 space-y-3">
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-clock mx-3 text-theme-warning-800"></i>
                                    <input id="status-pending" type="radio" required value="pending"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-pending"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ __('Pending') }}
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-check mx-3 text-theme-success-800 dark:text-theme-success-300"></i>
                                    <input id="status-approved" type="radio" required value="approved"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-approved"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ __('Approved') }}
                                    </label>
                                </span>
                            </li>
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-xmark mx-3 text-theme-danger-800 dark:text-theme-danger-300"></i>
                                    <input id="status-suspended" type="radio" required value="suspended"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-suspended"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        {{ __('Suspended') }}
                                    </label>
                                </span>
                            </li>
                        </ul>
                        <div>
                            <x-primary-button
                                class="w-full justify-center bg-theme-danger-600 hover:bg-theme-danger-900 focus:bg-theme-danger-900 active:bg-theme-danger-600">
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
        // self executing function here
        // (function() {
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
        openUserModal = (id, status) => {
            let myModal = new Modal(modalEl, options);
            document.getElementById('user-id').value = id;
            document.getElementById(`status-${status}`).checked = true;
            myModal.show();
        }
        closeUserModal = () => {
            let myModal = new Modal(modalEl, options);
            myModal.hide();
            document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.remove());
        }

        // })();
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


                // create an array of objects with the id, trigger element (eg. button), and the content element
                const tabElements = [
                    @if(Auth::user()?->roles->first()->name == "Admin" && Auth::user()?->roles->first()->id == 1)
                        {
                            id: 'profile',
                            triggerEl: document.querySelector('#profile-tab-example'),
                            targetEl: document.querySelector('#profile-example')
                        },
                        {
                            id: 'dashboard',
                            triggerEl: document.querySelector('#dashboard-tab-example'),
                            targetEl: document.querySelector('#dashboard-example')
                        },
                    @endif
                                    @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2)
                        {
                            id: 'settings',
                            triggerEl: document.querySelector('#settings-tab-example'),
                            targetEl: document.querySelector('#settings-example')
                        },
                    @endif
                    @if(Auth::user()?->roles->first()->id == 1 || Auth::user()?->roles->first()->id == 2 || Auth::user()?->roles->first()->id == 3)
                        {
                            id: 'contacts',
                            triggerEl: document.querySelector('#contacts-tab-example'),
                            targetEl: document.querySelector('#contacts-example')
                        }
                    @endif
                ];

                // options with default values
                const tabOptions = {
                    defaultTabId: 'contacts',
                    activeClasses: 'bg-theme-primary-900 bg-gray-100 active dark:bg-gray-900 dark:text-theme-primary-400 dark:hover:text-theme-primary-400',
                    inactiveClasses: 'bg-theme-primary-600 hover:text-white dark:bg-gray-700 dark:hover:bg-gray-900',
                    onShow: () => {
                        console.log('tab is shown');
                    }
                };

                const tabs = new Tabs(tabElements, tabOptions);
            });
        </script>
    @endsection

</x-app-layout>
