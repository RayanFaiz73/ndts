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
                                    {{ __('Name') }}
                                </label>
                                <p class="text-xl">{{$patient->name}}</p>
                                @error('name')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('NIC') }}
                                </label>
                                <p class="text-xl">{{$patient->nic}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('DOB') }}
                                </label>
                                <p class="text-xl">{{$patient->dob}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Age') }}
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
                                    {{ __('Gender') }}
                                </label>
                                <p class="text-xl">{{$patient->sex == 'male' ? 'Male' : 'Female'}}</p>
                                @error('phone')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Disease') }}
                                </label>
                                <p class="text-xl">{{$patient->diagnose->diagnose}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Data Operator') }}
                                </label>
                                <p class="text-xl">{{$patient->staff->name}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Hospital') }}
                                </label>
                                <p class="text-xl">{{$patient->hospital->data_name}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Address') }}
                                </label>
                                <p class="text-xl">{{$patient->address}}</p>
                                @error('nic')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                {{-- <label class="block  text-sm font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('
                                </label> --}}
                                <a class="w-full h-10 text-center inline-flex justify-center mt-4 px-4 py-2 bg-theme-warning-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-theme-primary-300 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                                    href="{{asset(Storage::url('pdf/'.$patient->pdf))}}" download>
                                    <span class="mt-1">
                                        Download  PDF
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
