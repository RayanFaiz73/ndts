<tr class="bg-theme-primary-500 border-b border-theme-primary-400">
    <td scope="row" class="px-3 py-3 font-medium text-theme-primary-50 whitespace-nowrap dark:text-theme-primary-100">
        <div>
            <div class="text-base font-bold">{{ $user->name }}</div>
            <div class="font-semibold text-theme-success-300">{{ $user->email }}</div>
        </div>
    </td>
    <td class="px-3 py-3">
        {{ $user->roles->first()->name }}
        {{-- {{ $user->role->name }} --}}
    </td>
    <td class="px-3 py-3">
        {{ $user->email_verified_at ? __('Yes') : __('No') }}
    </td>
    <td class="px-3 py-3">
        @if ($user->status == 'pending')
            <span
                class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-warning-800 bg-theme-warning-300 rounded dark:bg-theme-warning-900 dark:text-theme-warning-300">
                <i class="fas fa-user-clock mx-3 text-theme-warning-800"></i>
                {{ __('Pending') }}
            </span>
        @elseif ($user->status == 'approved')
            <span
                class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-success-800 bg-theme-success-300 rounded dark:bg-theme-success-900 dark:text-theme-success-300">
                <i class="fas fa-user-check mx-3 text-theme-success-800 dark:text-theme-success-300"></i>
                {{ __('Approved') }}
            </span>
        @else
            <span
                class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-danger-800 bg-theme-danger-300 rounded dark:bg-theme-danger-900 dark:text-theme-danger-300">
                <i class="fas fa-user-xmark mx-3 text-theme-danger-800 dark:text-theme-danger-300"></i>
                {{ __('Suspended') }}
            </span>
        @endif
    </td>
    <td class="px-3 py-3">{{ \Carbon\Carbon::parse($user->created_at)->toDayDateTimeString() }}</td>
    @can("$permission-update")
    <td class="px-3 py-3 text-center">
        <x-primary-button class="bg-theme-danger-600 hover:bg-theme-danger-900 focus:bg-theme-danger-900 active:bg-theme-danger-600" type="button"
            value="{{ $user->status }}" onclick="openUserModal({{ $user->id }},'{{ $user->status }}')">
            <i class="fas fa-user-gear"></i>
        </x-primary-button>
        <x-warning-link class="ml-3" :href="route('admin.user.edit', ['user' => $user->id])">
            <i class="fas fa-pen-to-square"></i>
        </x-warning-link>
    </td>
    @endcan
</tr>
