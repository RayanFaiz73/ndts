<x-app-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('assets/site/plugins/nice-select2/dist/css/nice-select2.css') }}" />
        <style>
            .nice-select .nice-select-dropdown {
                background-color: #004f7a;
            }

            .nice-select .option:hover,
            .nice-select .option.focus,
            .nice-select .option.selected.focus {
                background-color: #002b42;
            }
        </style>
        @endsection
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-secondary-100 dark:text-white">
                    Hospital
                </h2>
                {{-- @can("$permission-read") --}}
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 text-theme-secondary-100" :href="route('admin.hospitals.index')">
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
                <div class="p-6 text-theme-secondary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-secondary-100 dark:text-white">
                                    {{ __('Create Hospital') }}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.hospitals.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role_id" value="3">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Hospital Name') }}
                                        </label>
                                        <input required="required" name="data_name" value="{{ old('data_name') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('data_name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Owner Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Owner Email') }}
                                        </label>
                                        <input required="required" name="email" value="{{ old('email') }}"
                                            autocomplete="username"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="email" placeholder="{{ __('Please enter email address here') }}...">
                                        @error('email')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Owner Password') }}
                                        </label>
                                        <input required="required" name="password" value="{{ old('password') }}"
                                            autocomplete="new-password"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password here') }}...">
                                        @error('password')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Phone Number') }}
                                        </label>
                                        <input required="required" name="phone" value="{{ old('phone') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter phone here') }}...">
                                        @error('phone')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Type') }}
                                        </label>
                                        <select required name="type" id="type"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            <option value="government">{{ __('Government') }}</option>
                                            <option value="private">{{ __('Private') }}</option>
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                    <hr class="mb-4">
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                    @if (Auth::user()->role_id == 1)
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="country_id_div">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Country') }}
                                        </label>
                                        <select required name="country_id" id="country_id" onChange="fetchStatesByCountry(this, 'state_id', '{{ route('admin.resource.fetchState') }}')"
                                            class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($countries as $key => $country)
                                            <option value="{{ $country->id }}" >{{ __($country->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="state_id_div">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('State') }}
                                        </label>
                                        <select required name="state_id" id="state_id" onChange="fetchCitiesByState(this, 'city_id', '{{ route('admin.resource.fetchCities') }}')"
                                            class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            {{-- @foreach ($states as $key => $state)
                                            <option value="{{ $state->id }}">{{ __($state->name) }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="city_id_div">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('City') }}
                                        </label>
                                        <select required name="city_id" id="city_id"
                                            class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            {{-- @foreach ($cities as $key => $city)
                                            <option value="{{ $city->id }}">{{ __($city->name) }}</option>
                                            @endforeach --}}
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <input type="hidden" name="country_id" value="{{ Auth::user()->state->country_id }}">
                                    <input type="hidden" name="state_id" value="{{ Auth::user()->state_id}}">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="city_id_div">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('City') }}
                                        </label>
                                        <select required name="city_id" id="city_id"
                                            class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                           @foreach (Auth::user()->state->cities as $city)
                                            <option value="{{ $city->id }}">{{ __($city->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Address Line 1') }}
                                        </label>
                                        <input required="required" name="address_one" value="{{ old('address_one') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('address_one')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ 'Address Line 2' }} <small>{{ '(Optional)' }}</small>
                                        </label>
                                        <input required="required" name="address_two" value="{{ old('address_two') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('address_two')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Zip Code') }}
                                        </label>
                                        <input required="required" name="zip_code" value="{{ old('zip_code') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter phone here') }}...">
                                        @error('zip_code')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                    <x-primary-button>
                                        {{ __('Create') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @section('scripts')
    <script>
        var options = {
                    searchable: true,
                    placeholder:"Select Option"
                };
                let niceSelectDropdown = NiceSelect.bind(document.getElementById("country_id"), options);
                let niceStateDropdown = NiceSelect.bind(document.getElementById("state_id"), options);
                let niceCityDropdown = NiceSelect.bind(document.getElementById("city_id"), options);

                let getAjaxData = (elem) => {
                    console.log(elem);
                }

                let fetchStatesByCountry = (elem, name, url) => {
                    $(`select[name=${name}]`).css({
                        display: 'none'
                    });
                    $.ajax({
                        url: `{{ route('admin.resource.fetchState') }}?id=${elem.value}`,
                        type: 'GET',
                        success: res => {
                            let options = '<option value="">Select State...</option>';
                            res.data.forEach(obj => {
                                options += `<option value="${obj.id}">${obj.name}</option>`;
                            });
                            $(`select[name=${name}]`).html(options);
                            $(`select[name=${name}]`).css({
                                display: 'block'
                            });
                            niceStateDropdown.update();
                        },
                        error: err => {
                            console.error(err);
                        }
                    });
                }
                let fetchCitiesByState = (elem, name, url)=>{
                    $(`select[name=${name}]`).css({display: 'none'});
                    $.ajax({
                        url: `{{ route('admin.resource.fetchCities') }}?id=${elem.value}`,
                        type: 'GET',
                        success: res => {
                            let options = '<option value="">Select City...</option>';
                            res.data.forEach(obj => {
                                options += `<option value="${obj.id}">${obj.name}</option>`;
                            });
                            $(`select[name=${name}]`).html(options);
                            $(`select[name=${name}]`).css({display: 'block'});
                            niceCityDropdown.update();
                        },
                        error: err => {
                            console.error(err);
                        }
                    });
                }

                $(function () {
                    let searchInputValue = '';

                    $(document).on('keyup', '.nice-select-search', function () {
                        let value = this.value;
                        searchInputValue = value;
                        if (value.length < 2) {
                                $('#country_id').html('');
                                // $('#country_id').append(`<option value=""> Select Option </option>`);
                                $('.nice-select-search').val(searchInputValue);
                            return false;
                        }
                        else if (value.length == 2) {
                                $('#country_id').html('');
                                // $('#country_id').append(`<option value=""> Select Option </option>`);
                                console.log(niceSelectDropdown);
                                if (!Array.isArray(niceSelectDropdown.data) || !niceSelectDropdown.data.length) {
                                }
                                else {
                                    niceSelectDropdown.update();
                                }
                                // if(empty(niceSelectDropdown.data)){
                                //     niceSelectDropdown.update();
                                // }

                                $('.nice-select-search').val(searchInputValue);
                            return false;
                        }

                        $.ajax({
                            url: `{{ route('admin.resource.fetchCountry') }}?name=${value}`,
                            type: 'GET',
                            success: res => {
                                console.log(res);
                                let selectedValue = $('#country_id').val();
                                $('#country_id').html('');
                                // $('#country_id').append(`<option value=""> Select Option </option>`);
                                res.data.forEach(country => {
                                    $('#country_id').append(
                                        `<option value="${country.id}">${country.name}</option>`
                                    );
                                });
                                niceSelectDropdown.update();

                                $('.nice-select-search').val(searchInputValue);

                                $('#country_id').val(selectedValue);
                            },
                            error: err => {
                                console.error(err);
                            }
                        });
                    });
                });
    </script>
    @endsection --}}
    @section('scripts')
    <script>
        var options = {
                searchable: true,
            };
            @if (Auth::user()->role_id == 1)

            let countrySelectDropdown = NiceSelect.bind(document.getElementById("country_id"), options);
            let stateSelectDropdown = NiceSelect.bind(document.getElementById("state_id"), options);
            let citySelectDropdown = NiceSelect.bind(document.getElementById("city_id"), options);
            @else
            let citySelectDropdown = NiceSelect.bind(document.getElementById("city_id"), options);
            @endif

            let getAjaxData = (elem) => {
                console.log(elem);
            }
             let fetchStatesByCountry = (elem, name, url) => {
                    $(`select[name=${name}]`).css({
                        display: 'none'
                    });
                    $.ajax({
                        url: `{{ route('admin.resource.fetchState') }}?id=${elem.value}`,
                        type: 'GET',
                        success: res => {
                            let options = '<option value="">Select State...</option>';
                            res.data.forEach(obj => {
                                options += `<option value="${obj.id}">${obj.name}</option>`;
                            });
                            $(`select[name=${name}]`).html(options);
                            $(`select[name=${name}]`).css({
                                display: 'block'
                            });
                            stateSelectDropdown.update();
                        },
                        error: err => {
                            console.error(err);
                        }
                    });
                }
                let fetchCitiesByState = (elem, name, url)=>{
                    $(`select[name=${name}]`).css({display: 'none'});
                    $.ajax({
                        url: `{{ route('admin.resource.fetchCities') }}?id=${elem.value}`,
                        type: 'GET',
                        success: res => {
                            let options = '<option value="">Select City...</option>';
                            res.data.forEach(obj => {
                                options += `<option value="${obj.id}">${obj.name}</option>`;
                            });
                            $(`select[name=${name}]`).html(options);
                            $(`select[name=${name}]`).css({display: 'block'});
                            citySelectDropdown.update();
                        },
                        error: err => {
                            console.error(err);
                        }
                    });
                }

            $(function () {
                let searchInputValue = '';
                $("#country_id_div .nice-select-search, #state_id_div .nice-select-search, #city_id_div .nice-select-search").keyup(function() {
                    console.log(this)
                    let mainDiv = $(this).parent().parent().parent().parent();
                    let newDropDown;
                    let currentSelect;
                    let url;
                    let elem = this;
                    let value = this.value;

                    if(mainDiv.attr('id') == 'country_id_div'){
                        newDropDown = countrySelectDropdown;
                        currentSelect = $('#country_id_div');
                        url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                    }
                    else if(mainDiv.attr('id') == 'state_id_div'){
                        newDropDown = stateSelectDropdown;
                        currentSelect = $('#state_id_div');
                        url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                    }
                    else if(mainDiv.attr('id') == 'city_id_div'){
                        newDropDown = citySelectDropdown;
                        currentSelect = $('#city_id_div');
                        url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                    }
                    let selectedValue = $(currentSelect).val();
                    // newDropDown.update();
                    $(elem).val(value);
                    $(currentSelect).val(selectedValue);
                });
            });
    </script>
    @endsection

</x-app-layout>
<script>




</script>
