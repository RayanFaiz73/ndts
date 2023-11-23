<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    Patients
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.patients.index')">
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
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
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
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name',$patient->name) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('NIC') }}
                                        </label>
                                        <input required="required" name="nic" value="{{ old('nic',$patient->nic) }}"
                                            autocomplete="new-password"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter NIC number') }}"
                                            onkeypress="formatNIC(this)">
                                        @error('nic')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Age') }}
                                        </label>
                                        <input required="required" name="age" value="{{ old('age',$patient->age) }}"
                                            autocomplete="age"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter  age here') }}...">
                                        @error('email')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('DOB') }}
                                        </label>
                                        <input required="required" name="dob" value="{{ old('dob',$patient->dob) }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="date" placeholder="{{ __('Please enter password again') }}...">
                                        @error('dob')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                {{ __('Gender') }}
                                            </label>
                                            <select required="required" name="sex" id="sex" onChange="getManagers(this)"
                                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
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
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                {{ __('Diagnoses') }}
                                            </label>
                                            <select required="required" name="diagnoses_id" id="diagnoses_id"
                                                onChange="getManagers(this)"
                                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Diagnoses') }} </option>
                                                @foreach ($diagnoses as $diagnose)
                                                <option value="{{ $diagnose->id }}" @if (old('diagnoses_id',$patient->diagnoses_id)==$diagnose->id)
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
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                {{ __('Hospital') }}
                                            </label>
                                            <select required="required" name="hospital_id" id="hospital_id"
                                                onChange="getManagers(this)"
                                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('select Hospital') }} </option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}" @if (old('hospital_id', $patient->hospital_id) == $hospital->id) selected @endif>
                                                    {{ $hospital->data_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    @else
                                    <input type="hidden" name="hospital_id" value="{{ Auth::user()->parent->id }}">
                                    @endif
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label
                                                class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                {{ __('Staff') }}
                                            </label>
                                            <select required="required" name="staff_id" id="staff_id"
                                                onChange="getManagers(this)"
                                                class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('Select Diagnoses') }} </option>
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
                                    @if(Auth::user()->role_id == 1)
                                    <div class="w-full lg:w-12/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Address') }}
                                        </label>
                                        <input required="required" name="address"
                                            value="{{ old('address',$patient->address) }}" rows="8"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            placeholder="{{ __('Please enter address here') }}...">
                                        @error('address')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                            {{ __('Address') }}
                                        </label>
                                        <input required="required" name="address" value="{{ old('address',$patient->address) }}" rows="8"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            placeholder="{{ __('Please enter address here') }}...">
                                        @error('address')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @endif
                                    @if($patient->pdf)
                                    <div class="w-full lg:w-10/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" for="file_input">Upload
                                            file</label>
                                        <input
                                            class="block w-full text-sm text-theme-primary-100 border border-theme-success-200 rounded-lg cursor-pointer bg-theme-primary-500  focus:outline-none"
                                           name="pdf" id="pdf" type="file">
                                        @error('pdf')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center justify-center">
                                        <a href="{{asset(Storage::url('pdf/'.$patient->pdf))}}" target="_blank">
                                            <svg class="w-10 h-10 mt-2 text-theme-danger-400 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M4.5 11H4v1h.5a.5.5 0 0 0 0-1ZM7 5V.13a2.96 2.96 0 0 0-1.293.749L2.879 3.707A2.96 2.96 0 0 0 2.13 5H7Zm3.375 6H10v3h.375a.624.624 0 0 0 .625-.625v-1.75a.624.624 0 0 0-.625-.625Z" />
                                                <path
                                                    d="M19 7h-1V2a1.97 1.97 0 0 0-1.933-2H9v5a2 2 0 0 1-2 2H1a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h1a1.969 1.969 0 0 0 1.933 2h12.134c1.1 0 1.7-1.236 1.856-1.614a.988.988 0 0 0 .07-.386H19a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1ZM4.5 14H4v1a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1h1.5a2.5 2.5 0 1 1 0 5Zm8.5-.625A2.63 2.63 0 0 1 10.375 16H9a1 1 0 0 1-1-1v-5a1 1 0 0 1 1-1h1.375A2.63 2.63 0 0 1 13 11.625v1.75ZM17 12a1 1 0 0 1 0 2h-1v1a1 1 0 0 1-2 0v-5a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-1v1h1Z" />
                                            </svg>
                                        </a>
                                    </div>
                                    @else
                                    <div class="w-full lg:w-12/12 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" for="file_input">Upload
                                            file</label>
                                        <input
                                            class="block w-full text-sm text-theme-primary-100 border border-theme-success-200 rounded-lg cursor-pointer bg-theme-primary-500  focus:outline-none"
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
</x-app-layout>
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
