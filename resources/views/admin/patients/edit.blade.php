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
                    Patients
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 text-theme-secondary-100" :href="route('admin.patients.index')">
                                All Patients
                            </x-primary-link>
                        </div>
                    </div>
                </div>
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
                                <h2 class="text-2xl font-bold text-theme-secondary-100 dark:text-white">
                                    {{ __('Edit Patient ')}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.patients.update',$patient->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name',$patient->name) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('NIC') }}
                                        </label>
                                        <input required="required" name="nic" value="{{ old('nic',$patient->nic) }}"
                                            autocomplete="new-password"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter NIC number') }}"
                                            onkeypress="formatNIC(this)">
                                        @error('nic')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('DOB') }}
                                        </label>
                                        <input required="required" name="dob" value="{{ old('dob',$patient->dob) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="date" placeholder="{{ __('Please enter password again') }}...">
                                        @error('dob')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Gender') }}
                                            </label>
                                            <select required="required" name="sex" id="sex"
                                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select a Option') }} </option>
                                                <option value="male" {{$patient->sex == 'male' ? 'selected' : ''}}> {{
                                                    __('Male') }} </option>
                                                <option value="female" {{$patient->sex == 'female' ? 'selected' : ''}}>
                                                    {{ __('Female') }} </option>
                                                <option value="other" {{$patient->sex == 'other' ? 'selected' : ''}}> {{
                                                    __('Other') }} </option>
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="diagnoses_id_div">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Disease') }}
                                            </label>
                                            <select required="required" name="diagnoses_id" id="diagnoses_id"

                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Disease') }} </option>
                                                @foreach ($diagnoses as $diagnose)
                                                <option value="{{ $diagnose->id }}" @if (old('diagnoses_id',$patient->
                                                    diagnoses_id)==$diagnose->id)
                                                    selected @endif>
                                                    {{ $diagnose->diagnose }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_id == 1)
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="hospital_id_div">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Hospital') }}
                                            </label>
                                            <select required="required" name="hospital_id" id="hospital_id" onChange="fetchStaffsByHospital(this, 'staff_id', '{{ route('admin.resource.fetchStaff') }}')"

                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Hospital') }} </option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}" @if (old('hospital_id', $patient->
                                                    hospital_id) == $hospital->id) selected @endif>
                                                    {{ $hospital->data_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->role_id == 2)
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="hospital_id_div">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Hospital') }}
                                            </label>
                                            <select required="required" name="hospital_id" id="hospital_id" onChange="fetchStaffsByHospital(this, 'staff_id', '{{ route('admin.resource.fetchStaff') }}')"

                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Hospital') }} </option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}" @if (old('hospital_id', $patient->hospital_id) == $hospital->id)
                                                    selected @endif>
                                                    {{ $hospital->data_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->role_id == 3)
                                    <input type="hidden" name="hospital_id" value="{{ Auth::id() }}">
                                    @else
                                    <input type="hidden" name="hospital_id" value="{{ Auth::user()->parent->id }}">
                                    @endif
                                    @if(Auth::user()->role_id == 1)
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="staff_id_div">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Data Operator') }}
                                            </label>
                                            <select required="required" name="staff_id" id="staff_id"

                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Data Operator') }} </option>
                                                @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}" @if (old('staff_id',$patient->staff_id)==$staff->id)
                                                    selected @endif>
                                                    {{ $staff->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @elseif(Auth::user()->role_id == 2)
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3" id="staff_id_div">
                                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Data Operator') }}
                                            </label>
                                            <select required="required" name="staff_id" id="staff_id"
                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Data Operator') }} </option>
                                                @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}" @if (old('staff_id',$patient->staff_id)==$staff->id)
                                                    selected @endif>
                                                    {{ $staff->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                    <input type="hidden" name="staff_id" value="{{ Auth::id() }}">
                                    @endif
                                    @if(Auth::user()->role_id == 1)
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Address') }}
                                        </label>
                                        <input required="required" name="address"
                                            value="{{ old('address',$patient->address) }}" rows="8"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            placeholder="{{ __('Please enter address here') }}...">
                                        @error('address')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Address') }}
                                        </label>
                                        <input required="required" name="address"
                                            value="{{ old('address',$patient->address) }}" rows="8"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            placeholder="{{ __('Please enter address here') }}...">
                                        @error('address')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif
                                    @if($patient->pdf)
                                    <div class="w-full lg:w-10/12 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white"
                                            for="file_input">Upload
                                            file</label>
                                        <input
                                            class="block w-full text-sm text-theme-secondary-100 border border-theme-success-200 rounded-lg cursor-pointer bg-theme-primary-500  focus:outline-none"
                                            name="pdf" id="pdf" type="file">
                                        @error('pdf')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center w-full lg:w-2/12 items-center justify-center">
                                        <a class="w-full h-10 text-center inline-flex justify-center mt-4 px-4 py-2 bg-theme-primary-400 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-theme-primary-300 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150" href="{{asset(Storage::url('pdf/'.$patient->pdf))}}" target="_blank">
                                            <span class="mt-1">
                                            View PDF
                                            </span>
                                        </a>
                                    </div>
                                    @else
                                    <div class="w-full lg:w-12/12 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white"
                                            for="file_input">Upload
                                            file</label>
                                        <input
                                            class="block w-full text-sm text-theme-secondary-100 border border-theme-success-200 rounded-lg cursor-pointer bg-theme-primary-500  focus:outline-none"
                                            name="pdf" id="file_input" type="file">
                                        @error('pdf')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif

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
    @section('scripts')
    <script>
        function formatNIC(input) {
            var cleaned = input.value.replace(/\D/g, '');
            console.log(cleaned.length);
            if (cleaned.length >= 5 && cleaned.length < 12) {
                var formattedNIC = cleaned.substr(0, 5) + '-' + cleaned.substr(5, 6);

                input.value = formattedNIC;
            }
            else if(cleaned.length >= 11){
                var formattedNIC = cleaned.substr(0, 5) + '-' + cleaned.substr(5, 7) + '-' + cleaned.substr(14);

                input.value = formattedNIC;
            }
        }
    </script>
    <script>
        var options = {
                searchable: true,
                placeholder:"Select Option"
            };
            let diagnoseSelectDropdown = NiceSelect.bind(document.getElementById("diagnoses_id"), options);
            let hospitalSelectDropdown = NiceSelect.bind(document.getElementById("hospital_id"), options);
            let staffSelectDropdown = NiceSelect.bind(document.getElementById("staff_id"), options);

            let getAjaxData = (elem) => {
                console.log(elem);
            }
            let fetchStaffsByHospital = (elem, name, url) => {
                        $(`select[name=${name}]`).css({
                            display: 'none'
                        });
                        $.ajax({
                            url: `{{ route('admin.resource.fetchStaff') }}?id=${elem.value}`,
                            type: 'GET',
                            success: res => {
                                let options = '<option value="">Select Staff...</option>';
                                res.data.forEach(obj => {
                                    options += `<option value="${obj.id}">${obj.name}</option>`;
                                });
                                $(`select[name=${name}]`).html(options);
                                $(`select[name=${name}]`).css({
                                    display: 'block'
                                });
                                staffSelectDropdown.update();
                            },
                            error: err => {
                                console.error(err);
                            }
                        });
                    }
            $(function () {
                let searchInputValue = '';
                $("#diagnoses_id_div .nice-select-search, #hospital_id_div .nice-select-search, #staff_id_div .nice-select-search").keyup(function() {
                    console.log(this)
                    let mainDiv = $(this).parent().parent().parent().parent();
                    let newDropDown;
                    let currentSelect;
                    let url;
                    let elem = this;
                    let value = this.value;

                    if(mainDiv.attr('id') == 'diagnoses_id_div'){
                        newDropDown = diagnoseSelectDropdown;
                        currentSelect = $('#diagnoses_id');
                        url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                    }
                    else if(mainDiv.attr('id') == 'hospital_id_div'){
                        newDropDown = hospitalSelectDropdown;
                        currentSelect = $('#hospital_id');
                        url =`{{ route('admin.resource.fetchDiseases') }}?diagnose=${value}`;
                    }
                    else if(mainDiv.attr('id') == 'staff_id_div'){
                        newDropDown = staffSelectDropdown;
                        currentSelect = $('#staff_id');
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
