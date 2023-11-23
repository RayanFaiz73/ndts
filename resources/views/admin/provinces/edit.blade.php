<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    {{ __($heading.'s')}}
                </h2>
                {{-- @can("$permission-read") --}}
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 hover:bg-theme-primary-300"
                                :href="route('admin.provinces.index')">
                                {{ __('All '.$heading.'s')}}
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </x-slot>


    {{-- @can("$permission-read") --}}
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-theme-primary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    {{ __('Edit '.$heading)}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.provinces.update',$province->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="hidden" name="role_id" value="2">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                           {{ __('Province User Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name',$province->name) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Email') }}
                                        </label>
                                        <input required="required" name="email" value="{{ old('email',$province->email) }}"
                                            autocomplete="username"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="email" placeholder="{{ __('Please enter email address here') }}...">
                                        @error('email')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Password') }}
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
                                            {{ __('Status') }}
                                        </label>
                                        <select required name="status" id="status"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select status') }}</option>
                                            <option value="pending" {{$province->status == 'pending' ? 'selected' : ''}}>{{ __('Pending') }}</option>
                                            <option value="suspended" {{$province->status == 'suspended' ? 'selected' : ''}}>{{ __('Suspended') }}</option>
                                            <option value="approved" {{$province->status == 'approved' ? 'selected' : ''}}>{{ __('Approved') }}</option>
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Country') }}
                                        </label>
                                        <select required name="country_id" id="country_id" class="select2 bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($countries as $key => $country)
                                                <option value="{{ $country->id }}" @if ($country->id == $province->state->country_id) selected @endif>{{ __($country->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                        </div>

                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('State') }}
                                        </label>
                                        <select required name="state_id" id="state_id" class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                        </select>
                                        @error('status')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                        </div>

                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                    <x-primary-button class="hover:bg-theme-primary-300">
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
@section('scripts')
<script>
    const countrySelect = document.getElementById('country_id');
    const stateSelect = document.getElementById('state_id');

    const countries = @json($countries);
    const states = @json($states);
    const selectedStateId = {{$province->state_id}};

    countrySelect.addEventListener('change', function() {
        const selectedCountryId = parseInt(countrySelect.value);


        const filteredStates = states.filter(state => state.country_id === selectedCountryId);

        stateSelect.innerHTML = '<option value="" selected="selected">{{ __('Select State') }}</option>';

        filteredStates.forEach(state => {
            const option = document.createElement('option');
            option.value = state.id;
            option.textContent = state.name;
            stateSelect.appendChild(option);
        });

        const selectedStateForCountry = filteredStates.find(state => state.id === selectedStateId);
        if (selectedStateForCountry) {

            stateSelect.value = selectedStateForCountry.id;
        }
    });

    // Trigger change event if country is pre-selected
    if (countrySelect.value) {
        const event = new Event('change');
        countrySelect.dispatchEvent(event);
    }
</script>
    @endsection
    </x-app-layout>
