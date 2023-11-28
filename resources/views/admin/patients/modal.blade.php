<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
            class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <div class="p-6 text-theme-primary-100">
                <div class="card">
                    <div class="card-header">
                        <div class="heading-1 py-3">
                            <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                            </h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Name') }}
                                </label>
                                <p class="text-xl">{{$patient->name}}</p>
                                @error('name')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Nic') }}
                                </label>
                                <p class="text-xl">{{$patient->nic}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient DOB') }}
                                </label>
                                <p class="text-xl">{{$patient->dob}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Age') }}
                                </label>
                                <p class="text-xl">
                                    @php
                                    // $dateOfBirth = $patient->dob;
                                    // $age = \carbon\Carbon::parse($dateOfBirth)->age;
                                    // $dob = $age ? $age : '--';
                                    // $dob = $patient->dob ? \Carbon\Carbon::parse($patient->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days') : '--';
                                    $dob = $patient->dob ? \Carbon\Carbon::parse($patient->dob)->diff(\Carbon\Carbon::now())->format('%y years, %m month(s)') : '--';
                                    @endphp
                                    {{$dob}}</p>
                                @error('phone')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Gender') }}
                                </label>
                                <p class="text-xl">{{$patient->sex == 'male' ? 'Male' : 'Female'}}</p>
                                @error('phone')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Disease') }}
                                </label>
                                <p class="text-xl">{{$patient->diagnose->diagnose}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Staff') }}
                                </label>
                                <p class="text-xl">{{$patient->staff->name}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Hospital') }}
                                </label>
                                <p class="text-xl">{{$patient->hospital->data_name}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Patient Address') }}
                                </label>
                                <p class="text-xl">{{$patient->address}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
