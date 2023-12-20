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
                    {{ __($heading.'s')}}
                </h2>
                @can("$permission-read")
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 text-theme-secondary-100" :href="route('admin.data-operator.index')">
                                {{ __('All '.$heading.'s')}}
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                @endcan
            </div>
        </div>
    </x-slot>


    @can("$permission-read")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-theme-primary-700 border border-theme-success-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-theme-secondary-100">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-secondary-100 dark:text-white">
                                    {{ __('Create '.$heading)}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.data-operator.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="role_id" value="6">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Name') }}
                                        </label>
                                        <input required="required" name="name" value="{{ old('name') }}"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Email') }}
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
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Password') }}
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
                                            {{ __('Status') }}
                                        </label>
                                        <select required name="status" id="status"
                                            class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('select status') }}</option>
                                            @foreach (App\Models\User::STATUS_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('status', 'pending' )===(string) $key
                                                ? 'selected' : '' }}>
                                                {{ __($label) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @if(Auth::user()->role_id == 1)
                                        <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-3" id="parent_id_div">
                                            <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                                {{ __('Hospital') }}
                                            </label>
                                            <select required name="parent_id" id="parent_id"
                                                class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                                @foreach ($hospitals as $hospital)
                                                <option value="{{ $hospital->id }}">{{ $hospital->data_name}}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    @elseif(Auth::user()->role_id == 2)
                                    <div class="w-full lg:w-2/2 px-3 mb-6 lg:mb-3" id="parent_id_div">
                                        <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                                            {{ __('Hospital') }}
                                        </label>
                                        <select required name="parent_id" id="parent_id"
                                            class="wide selectize bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('Select Option') }}</option>
                                            @foreach ($hospitals->where('state_id',Auth::user()->state_id) as $hospital)
                                            <option value="{{ $hospital->id }}">{{ $hospital->data_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                        <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    @else
                                    <input type="hidden" name="parent_id" value="{{ Auth::id() }}">
                                    @endif
                                </div>
                                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                    <x-primary-button class="hover:bg-theme-primary-300">
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
 @section('scripts')
<script>
    var options = {
                searchable: true,
                placeholder:"Select Option"
            };
            let countrySelectDropdown = NiceSelect.bind(document.getElementById("parent_id"), options);

            let getAjaxData = (elem) => {
                console.log(elem);
            }
            $(function () {
                let searchInputValue = '';
                $("#parent_id_div .nice-select-search").keyup(function() {
                    console.log(this)
                    let mainDiv = $(this).parent().parent().parent().parent();
                    let newDropDown;
                    let currentSelect;
                    let url;
                    let elem = this;
                    let value = this.value;

                    if(mainDiv.attr('id') == 'parent_id_div'){
                        newDropDown = countrySelectDropdown;
                        currentSelect = $('#parent_id_div');
                        url =`{{ route('admin.resource.fetchHospitals') }}?diagnose=${value}`;
                    }
                    let selectedValue = $(currentSelect).val();
                    // newDropDown.update();
                    $(elem).val(value);
                    $(currentSelect).val(selectedValue);
                });
            });
</script>
@endsection
    @endcan
</x-app-layout>



