<table style="width: 100%" class="w-full text-sm text-left text-theme-secondary-100 dark:text-theme-secondary-100">
    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
        <tr class="rounded-xl">
            <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6 text-center">{{ __('Name') }}</th>
            <th scope="col" class=" px-3 py-3 w-1/6 text-center">{{ __('NIC') }}</th>
            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('AGE') }}</th>
            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center">{{ __('Hospital') }}</th>
        </tr>
    </thead>
    <tbody>
        @if($patients)
        @foreach ($patients as $patient)
        <tr class="bg-theme-primary-500 border-b border-theme-success-100">
            <td scope="row" class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $patient->name }}
            </td>
            <td scope="row" class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $patient->nic }}
            </td>
            <td scope="row" class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                @php
                    $dateOfBirth = $patient->dob;
                    $age = \carbon\Carbon::parse($dateOfBirth)->age;
                    $dob = $age ? $age : '--';
                @endphp
                {{ $dob }}
            </td>
            <td scope="row" class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
                {{ $patient->hospital->data_name}}
            </td>
        </tr>
        @endforeach
        @else
          <tr class="bg-theme-primary-500 border-b border-theme-success-100">
            <td scope="row" class=" text-center py-4 font-medium text-white whitespace-nowrap dark:text-theme-primary-100">
               No Patient Have This Data Operator
            </td>
        </tr>
        @endif


    </tbody>
</table>
