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
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Hospital Name') }}
                                </label>
                                <p class="text-md">{{$hospital->data_name}}</p>
                                @error('data_name')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Owner Name') }}
                                </label>
                                <p class="text-md">{{$hospital->name}}</p>
                                @error('name')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Owner Email') }}
                                </label>
                                <p class="text-md">{{$hospital->email}}</p>
                                @error('email')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Phone Number') }}
                                </label>
                                <p class="text-md">{{$hospital->phone}}</p>
                                @error('phone')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Type') }}
                                </label>
                                <p class="text-md">{{$hospital->type == 'government' ? 'Government' : 'Private'}}</p>
                                @error('phone')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <hr class="mb-4">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Country') }}
                                </label>
                                <p class="text-md">{{$hospital->country->name}}</p>
                                @error('status')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('State') }}
                                </label>
                                <p class="text-md">{{$hospital->state->name}}</p>
                                @error('status')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('City') }}
                                </label>
                                <p class="text-md">{{$hospital->city->name}}</p>
                                @error('status')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Address Line ') }}
                                </label>
                                <p class="text-md">{{$hospital->address_one. ' ' . $hospital->address_two}}</p>
                                @error('address_one')
                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-6">
                                <label class="block  text-xl font-medium text-theme-primary-100 dark:text-white">
                                    {{ __('Zip Code') }}
                                </label>
                                <p class="text-md">{{$hospital->zip_code}}</p>
                                @error('zip_code')
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
