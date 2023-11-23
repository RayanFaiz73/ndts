    <x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-800 dark:text-white">
                    {{ __($heading.'s')}}
                </h2>
                {{-- @can("$permission-read") --}}
                <div class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.user.index')">
                                {{ __('All '.$heading.'s')}}
                            </x-primary-link>
                        </div>
                    </div>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </x-slot>


    @can("$permission-read")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-800 dark:text-white">
                                    {{ __('Create '.$heading)}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.user.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Name') }}
                                        </label>
                                        <input  required="required" name="name" value="{{ old('name') }}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Email') }}
                                        </label>
                                        <input  required="required" name="email" value="{{ old('email') }}"
                                            autocomplete="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="email" placeholder="{{ __('Please enter email address here') }}...">
                                        @error('email')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Password') }}
                                        </label>
                                        <input  required="required" name="password" value="{{ old('password') }}"
                                            autocomplete="new-password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password here') }}...">
                                        @error('password')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Confirm Password') }}
                                        </label>
                                        <input  required="required" name="password_confirmation"
                                            value="{{ old('password_confirmation') }}" autocomplete="confirm-password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password again') }}...">
                                        @error('password_confirmation')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="contents" id="rolesDiv">
                                        <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ __('Role') }}
                                            </label>
                                            <select  required="required" name="role_id" id="role_id"
                                                onChange="getManagers(this)"
                                                {{-- onChange="showDropdowns(this)" --}}
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                <option value=""> {{ __('select role') }} </option>
                                                @foreach ($role_news as $role)
                                                    <option value="{{ $role->id }}"
                                                        @if (old('role_id') == $role->id) selected @endif>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('role_id')
                                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if(!old('manager_id')) hidden @endif" id="divHidden1">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Manager
                                        </label>
                                        <select name="manager_id" id="select_1"
                                            onChange="getParentChilds(this,'2','2')"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value=""> Please select any option </option>
                                            @foreach ($managers as $manager)
                                                <option value="{{ $manager->id }}"
                                                    @if (old('manager_id') == $manager->id) selected @endif>
                                                    {{ $manager->name }} </option>
                                            @endforeach
                                        </select>
                                        @error('manager_id')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if(!old('client_id')) hidden @endif" id="divHidden2">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Client
                                        </label>
                                        <select name="client_id" id="select_2"
                                            onChange="getParentChilds(this,'3','3','false')"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value=""> Please select any option </option>
                                        </select>
                                    </div> --}}
                                    <div
                                    {{-- class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if (old('role_id' != 4)) hidden @elseif(!old('role_id')) hidden @endif" --}}
                                    class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if (old('role_id' != 3)) hidden @elseif(!old('role_id')) hidden @endif"
                                        id="divCertificates">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Certificates') }}
                                        </label>
                                        <input name="certificates"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            value="{{old('certificates')}}">
                                        @error('certificates')
                                            <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    {{-- <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 hidden" id="divHidden3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            User
                                        </label>
                                        <select name="user_id" id="select_3"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value=""> Please select any option </option>
                                        </select>
                                    </div> --}}
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Status') }}
                                        </label>
                                        <select required name="status" id="status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="">{{ __('select status') }}</option>
                                            @foreach (App\Models\User::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}"
                                                    {{ old('status', 'pending') === (string) $key ? 'selected' : '' }}>
                                                    {{ __($label) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status')
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
    @section('scripts')
        <script>
            var managers = `<option value=""> {{ __('Please select any option') }} </option>`;
            @foreach ($managers as $manager)
                managers +=
                    `<option value="{{ $manager->id }}" @if (old('manager_id') == $manager->id) selected @endif > {{ $manager->name }} </option>`;
            @endforeach
            var role_id = 1;
            getManagers = (el) => {
                $("#divCertificates").addClass('hidden');
                $(el).parent().nextAll('div').remove();
                let id = el.value;
                role_id = id;
                let minValue = 3;
                var url = "{{ route('admin.user.getManagers') }}";
                if(!id || id < minValue){

                    return false;
                }
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        id: id - 1
                    },
                    success: function(dataResult) {
                        var divElem = $('<div />', {
                            class  : "w-full lg:w-1/2 px-3 mb-6 lg:mb-3",
                        }).appendTo('#rolesDiv');
                        var labelElem = $('<label />', {
                            class  : "block mb-2 text-sm font-medium text-gray-900 dark:text-white",
                            html   : dataResult.label
                        }).appendTo(divElem);

                        var selectElem = $('<select />', {
                            name   : "parent",
                            class  : "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500",
                            append : dataResult.options,
                        }).appendTo(divElem);

                        $(selectElem).attr('onchange', 'getUsers(this)');
                    }
                });
            }
            getUsers = (el) => {
                $(el).parent().nextAll('div').remove();
                let id = el.value;
                let minValue = 3;
                var url = "{{ route('admin.user.getUsers') }}";
                if(!id || id < minValue){

                    return false;
                }
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        id: id,
                        role_id:role_id
                    },
                    success: function(dataResult) {
                        if(dataResult.success){
                            var divElem = $('<div />', {
                                class  : "w-full lg:w-1/2 px-3 mb-6 lg:mb-3",
                            }).appendTo('#rolesDiv');
                            var labelElem = $('<label />', {
                                class  : "block mb-2 text-sm font-medium text-gray-900 dark:text-white",
                                html   : dataResult.label
                            }).appendTo(divElem);

                            var selectElem = $('<select />', {
                                name   : "parent",
                                class  : "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500",
                                append : dataResult.options,
                            }).appendTo(divElem);

                            $(selectElem).attr('onchange', 'getUsers(this)');

                        }
                        if (dataResult.certificateShow) {
                            $("#divCertificates").removeClass('hidden');
                        } else {
                            $("#divCertificates").addClass('hidden');
                        }
                    }
                });
            }
            showDropdowns = (el) => {
                let selecetedIndex = el.selectedIndex;
                let selectedOption = el.options[selecetedIndex];
                let value = selectedOption.value;
                let roleName = selectedOption.text;
                var lastValue = el.options[el.options.length - 1].value;
                if (value) {
                    roleName = roleName.toLowerCase();
                    let newValue = value - 1;
                    for (var i = 0; i < newValue; i++) {
                        // alert(i);
                        $("#divHidden" + i).removeClass('hidden');
                        $("#select_" + i).attr('required', 'required');
                    }
                    for (var j = newValue; j <= lastValue; j++) {
                        $("#divHidden" + j).addClass('hidden');
                        $("#select_" + j).removeAttr('required').empty().append(
                            `<option value=""> {{ __('Please select any option') }}</option>`);
                    }
                    $("#select_1").empty().append(managers);
                    // $("#created_by").val("");
                    // if (value == 4) {
                    if (value == 3) {
                        $("#divCertificates").removeClass('hidden');
                    } else {
                        $("#divCertificates").addClass('hidden');
                    }
                }
            };
            getParentChilds = (el, hiddenElem, selectElem, required = true) => {
                let id = el.value;
                $("#select_" + selectElem).empty();
                $("#select_" + selectElem).append(`<option value=""> Please select any option </option>`);
                if (!id) {
                    // $("#divHidden"+hiddenElem).addClass('hidden');
                    // if(required){
                    //     $("#select_"+selectElem).removeAttr('required');
                    // }
                    // $("#created_by").val("");
                    return;
                }
                // $("#created_by").val(id);
                // $("#divHidden"+hiddenElem).removeClass('hidden');
                $("#select_" + selectElem).empty();
                // if(required){
                //     $("#select_"+selectElem).attr('required', 'required');
                // }
                var url = "{{ route('admin.user.children') }}";
                $.ajax({
                    url: url,
                    type: "POST",
                    cache: false,
                    data: {
                        id: id
                    },
                    success: function(dataResult) {
                        $("#select_" + selectElem).append(dataResult.options);
                    }
                });
            }

            let whitelist = {!! $certificates !!};
            // ApexCharts options and config
            window.addEventListener("load", function() {

                var input = document.querySelector('input[name=certificates]'),
                    tagify = new Tagify(input, {
                        trim: false, // if "delimiters" setting is using space as a delimeter, then "trim" should be set to "false"
                        keepInvalidTags: false, // do not remove invalid tags (but keep them marked as invalid)
                        createInvalidTags: false,
                        editTags: false,
                        maxTags: 6,
                        // blacklist: ["foo", "bar", "baz"],
                        whitelist: whitelist.map(function(item, val) {
                            return typeof item == 'string' ? {
                                value: item
                            } : item.title
                        }),
                        enforceWhitelist: true,
                        transformTag: transformTag,
                        backspace: "edit",
                        placeholder: "{{ __('type') }}",
                        dropdown: {
                            enabled: 0, // show suggestion after 1 typed character
                            fuzzySearch: false, // match only suggestions that starts with the typed characters
                            position: 'text', // position suggestions list next to typed text
                            caseSensitive: false, // allow adding duplicate items if their case is different
                        },
                        templates: {
                            dropdownItemNoMatch: function(data) {
                                return `<div class='${this.settings.classNames.dropdownItem}' value="noMatch" tabindex="0" role="option">{{ __('No suggestion found for:') }} <strong>${data.value}</strong></div>`
                            }
                        }
                    })

                // generate a random color (in HSL format, which I like to use)
                function getRandomColor() {
                    function rand(min, max) {
                        return min + Math.random() * (max - min);
                    }

                    var h = rand(1, 360) | 0,
                        s = rand(40, 70) | 0,
                        l = rand(65, 72) | 0;

                    return 'hsl(' + h + ',' + s + '%,' + l + '%)';
                }

                function transformTag(tagData) {
                    tagData.color = getRandomColor();
                    tagData.style = "--tag-bg:" + tagData.color;

                    if (tagData.value.toLowerCase() == 'shit')
                        tagData.value = 's✲✲t'
                }

                tagify.on('add', function(e) {
                    console.log(e.detail)
                })

                tagify.on('invalid', function(e) {
                    console.log(e, e.detail);
                })

                var clickDebounce;

                tagify.on('click', function(e) {
                    const {
                        tag: tagElm,
                        data: tagData
                    } = e.detail;

                    // a delay is needed to distinguish between regular click and double-click.
                    // this allows enough time for a possible double-click, and noly fires if such
                    // did not occur.
                    clearTimeout(clickDebounce);
                    clickDebounce = setTimeout(() => {
                        tagData.color = getRandomColor();
                        tagData.style = "--tag-bg:" + tagData.color;
                        tagify.replaceTag(tagElm, tagData);
                    }, 200);
                })

                tagify.on('dblclick', function(e) {
                    // when souble clicking, do not change the color of the tag
                    clearTimeout(clickDebounce);
                })
            });
        </script>
    @endsection
    @endcan
</x-app-layout>
