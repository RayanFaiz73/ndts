<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    Hospital
                </h2>
                {{-- @can("$permission-read") --}}
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.hospitals.index')">
                                All Hospital
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </x-slot>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-theme-primary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    {{ __('Edit Hospital')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.hospitals.update',$hospital->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role_id" value="3">
                                <input name="_method" type="hidden" value="POST">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Hospital Name') }}
                                        </label>
                                        <input required="required" name="data_name"
                                            value="{{ old('data_name',$hospital->data_name) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('data_name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Owner Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name',$hospital->name) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Owner Email') }}
                                        </label>
                                        <input required="required" name="email"
                                            value="{{ old('email',$hospital->email) }}" autocomplete="username"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="email" placeholder="{{ __('Please enter email address here') }}...">
                                        @error('email')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Owner Password') }}
                                        </label>
                                        <input required="required" name="password" value="{{ old('password') }}"
                                            autocomplete="new-password"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password here') }}...">
                                        @error('password')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Phone Number') }}
                                        </label>
                                        <input required="required" name="phone" value="{{ old('phone',$hospital->phone) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter phone here') }}...">
                                        @error('phone')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Type') }}
                                        </label>
                                        <select required name="type" id="type"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            <option value="government" {{$hospital->type == 'government' ? 'selected' :
                                                ''}}>{{ __('Government') }}</option>
                                            <option value="private" {{$hospital->type == 'private' ? 'selected' :
                                                ''}}>{{ __('Private') }}</option>
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    </div>
                                    <hr class="mb-4">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                    @if(Auth::user()->role_id == 1)
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Country') }}
                                        </label>
                                        <select required name="country_id" id="country_id"
                                            class="select2 bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($countries as $key => $country)
                                            <option value="{{ $country->id }}" @if (old('country_id', $hospital->
                                                country_id) == $country->id) selected @endif>{{ __($country->name) }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('State') }}
                                        </label>
                                        <select required name="state_id" id="state_id"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($states as $key => $state)
                                            <option value="{{ $state->id }}" @if (old('state_id', $hospital->state_id)
                                                == $state->id) selected @endif>{{ __($state->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('City') }}
                                        </label>
                                        <select required name="city_id" id="city_id"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($cities as $key => $city)
                                            <option value="{{ $state->id }}" @if (old('city_id', $hospital->city_id)
                                                == $city->id) selected @endif>{{ __($city->name) }}</option>
                                            @endforeach
                                            </select>
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <input type="hidden" name="country_id" value="{{ Auth::user()->state->country_id }}">
                                    <input type="hidden" name="state_id" value="{{ Auth::user()->state_id}}">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('City') }}
                                        </label>
                                        <select required name="city_id" id="city_id"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach (Auth::user()->state->cities as $city)
                                            <option value="{{ $city->id }}" @if (old('city_id', $hospital->city_id)== $city->id) selected @endif>{{ __($city->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Address Line 1') }}
                                        </label>
                                        <input required="required" name="address_one"
                                            value="{{ old('address_one',$hospital->address_one) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('address_one')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ ('Address Line 2') }} <small>{{('(Optional)')}}</small>
                                        </label>
                                        <input required="required" name="address_two"
                                            value="{{ old('address_two',$hospital->address_two) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('address_two')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Zip Code') }}
                                        </label>
                                        <input required="required" name="zip_code"
                                            value="{{ old('zip_code',$hospital->zip_code) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter phone here') }}...">
                                        @error('zip_code')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                    <x-primary-button>
                                        {{ __('Update') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
