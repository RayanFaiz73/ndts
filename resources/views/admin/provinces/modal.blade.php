<table style="width: 100%" class="w-full text-sm text-left text-theme-secondary-100 dark:text-theme-secondary-100">
    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
        <tr class="rounded-xl">
            <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6 ">{{ __('Name') }}</th>
            <th scope="col" class=" px-3 py-3 w-1/6 text-center">{{ __('Owner Name') }}</th>
            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Email') }}</th>
            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Type') }}</th>
            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center">{{ __('Phone') }}</th>
        </tr>
    </thead>
    <tbody>
        @if($hospitals)
        @foreach ($hospitals as $hospital)
        <tr class="bg-theme-primary-500 border-b border-theme-success-100">
            <td scope="row" class=" py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $hospital->data_name }}
            </td>
            <td scope="row"
                class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $hospital->name }}
            </td>
            <td scope="row"
                class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $hospital->email }}
            </td>
            <td scope="row"
                class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $hospital->type }}
            </td>
            <td scope="row"
                class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $hospital->phone }}
            </td>
        </tr>
        @endforeach
        @else
        <h1 class="px-3 py-3 w-1/6 text-center text-theme-success-100">No Hospital</h1>
        @endif

    </tbody>
</table>
