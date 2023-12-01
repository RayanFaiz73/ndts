@if (!isset($all))
   @php
       $all = false;
   @endphp
@endif
<div
    class="w-full p-4 bg-theme-primary-700  border border-theme-success-200 rounded-lg shadow  sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <div class="flex items-center justify-between mb-4">
        <h5 class="text-xl font-bold leading-none text-theme-secondary-100 dark:text-white"> {{ $role->name }} </h5>
        <span class="text-theme-secondary-100 dark:text-white">
            {{ __('Total users with this role') }} <span style="font-size: 1.75rem"> {{ $role->users->count() }} </span>
        </span>
    </div>
    <div class="flow-root">

        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-theme-secondary-100 uppercase bg-theme-primary-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 rounded-l-lg">
                             {{ __('Menu') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                             {{ __('C') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                             {{ __('R') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                             {{ __('U') }}
                        </th>
                        <th scope="col" class="px-6 py-3 rounded-r-lg">
                             {{ __('D') }}
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($role->permissions as $key => $role_permission)
                        @if ($key < 3 || $all)
                            <tr class="bg-theme-primary-700 dark:bg-gray-800">
                                <th scope="row"
                                    class="px-6 py-2 font-medium text-theme-secondary-100 whitespace-nowrap dark:text-white">
                                    {{ $role_permission->menu->name }}
                                </th>
                                <td class="px-6 py-2">
                                    @if ($role_permission->create == 1)
                                        <i class="fas fa-check fs-6 text-theme-success-100 dark:text-theme-success-300"></i>
                                    @else
                                        <i class="fas fa-ban text-theme-danger-500 dark:text-theme-danger-300"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-2">
                                    @if ($role_permission->read == 1)
                                        <i class="fas fa-check fs-6 text-theme-success-100 dark:text-theme-success-300"></i>
                                    @else
                                        <i class="fas fa-ban text-theme-danger-500 dark:text-theme-danger-300"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-2">
                                    @if ($role_permission->update == 1)
                                        <i class="fas fa-check fs-6 text-theme-success-100 dark:text-theme-success-300"></i>
                                    @else
                                        <i class="fas fa-ban text-theme-danger-500 dark:text-theme-danger-300"></i>
                                    @endif
                                </td>
                                <td class="px-6 py-2">
                                    @if ($role_permission->delete == 1)
                                        <i class="fas fa-check fs-6 text-theme-success-100 dark:text-theme-success-300"></i>
                                    @else
                                        <i class="fas fa-ban text-theme-danger-500 dark:text-theme-danger-300"></i>
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @empty

                    @endforelse
                </tbody>
            </table>
            @if ($role->permissions->count() > 3 && !$all)
                <div
                    class="flex items-center p-1 text-xs text-theme-secondary-100 rounded-lg bg-theme-primary-700 hover:bg-theme-primary-300 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                    <em>{{ __('and') }} {{ $role->permissions->count() - 3 }} {{ __('more') }}...</em>
                </div>
            @endif
        </div>

    </div>
    @if(!$all)
    <div class="mt-4 items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
        {{-- @if($check['status'] == 'delete')
            @can('delete-'.$titles['policy'])
            <a onclick="deleteRole({{$role->id}},'{{$role->name}}')" class="btn btn-danger   my-1 me-2">Delete Role</a> --}}
            @can("$permission-delete")
            <x-danger-button class="bg-theme-danger-500"  onclick="openDeleteModal({{$role->id}},'{{$role->name}}')">
                <i class="fas fa-plus-square mr-1 text-white"></i> {{ __('Delete') }}
            </x-danger-button>
            @endcan
            {{-- @endcan
            @can('update-'.$titles['policy']) --}}

            @can("$permission-update")
            <x-warning-link :href="route('admin.permission.edit',['role'=>$role->id])">
                <i class="fas fa-plus-square mr-1 text-white"></i> {{ __('Edit') }}
            </x-warning-link>
            @endcan
            {{-- @endcan
            @can('read-'.$titles['policy'])
            <button type="button" class="btn btn-primary btn-active-primary w-100 mt-2" data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">View Role</button> --}}

            @can("$permission-read")
            <x-primary-button  onclick="openViewModal({{$role->id}},'{{$role->name}}')">
                <i class="fas fa-plus-square mr-1 text-white"></i> {{ __('View') }}
            </x-primary-button>
            @endcan
            {{-- @endcan
            @else
            @can('read-'.$titles['policy'])
            <a href="{{route('admin.permissions.view',['id'=>$role->id])}}" class="btn btn-light btn-active-primary my-1 me-2">View Role</a>
            @endcan
            @can('update-'.$titles['policy'])
            <a href="{{route('admin.permissions.edit',['id'=>$role->id])}}" class="btn btn-light btn-active-light-primary my-1" >Edit Role</a>
            @endcan
        @endif --}}
    </div>
    @endif
</div>


