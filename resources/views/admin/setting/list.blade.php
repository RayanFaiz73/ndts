<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    {{ __($heading.'s') }}
                </h2>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
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
                            <div class="h3 py-3">
                                <div class="heading-1 py-3">
                                    <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                      {{ __('All '.$heading.'s')}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @can("$permission-update")
                                <form class="w-full" action="{{ route('admin.setting.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                      @endcan
                                    <div class="w-full flex justify-center">
                                             <div class="grid lg:grid-cols-4 grid-cols-1 w-full">
                                                  <div class="col-span-1 flex flex-col justify-center">
                                                       <button type="button" class="flex  hover:bg-theme-primary-400 border rounded-lg w-full h-22 py-4 px-4 my-2 items-center focus:outline-none border-theme-success-200 border-1" onclick="openTabs('step-1')">
                                                            <div class="flex items-center justify-center rounded-lg w-14 h-14 bg-theme-primary-500 font-semibold text-black">
                                                                <i class="fas fa-gear fs-2"></i>
                                                            </div>
                                                            <div class="flex items-center h-full pl-4">
                                                                 <span class="text-base font-semibold text-theme-primary-100 dark:text-white">{{ __('General '.$heading)}}</span>
                                                            </div>
                                                       </button>

                                                       <button type="button" class="flex  hover:bg-theme-primary-400 border border-theme-success-200 rounded-lg w-full h-22 py-4 px-4 my-2 items-center focus:outline-none" onclick="openTabs('step-2')">
                                                            <div class="flex items-center justify-center rounded-lg w-14 h-14 bg-theme-primary-500 font-semibold text-black">
                                                                <i class="fas fa-icons fs-2"></i>
                                                            </div>
                                                            <div class="flex items-center h-full pl-4">
                                                                 <span class="text-base font-semibold text-theme-primary-100 dark:text-white">{{ __('Social Media') }}</span>
                                                            </div>
                                                       </button>
                                                  </div>

                                                  <div id="step-1" class="lg:col-span-3 step-tab">
                                                       <div class="px-8">
                                                            <h4 class="text-2xl font-semibold mb-5 underline text-theme-primary-100 dark:text-white">{{ __('General '.$heading)}}</h4>

                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <img class="rounded h-36 rounded-xl" src="{{ asset('assets/site/images/'.siteSetting('logo')) }}" alt="Logo"
                                                                    onclick="$('input[name=logo]').trigger('click');" id="clientImg">
                                                                    <input type="file" name="logo" class="hidden" onchange="renderImg(this, '#clientImg');" accept=".jpeg,.png,.jpg,.gif,.svg">
                                                                </div>
                                                            </div>

                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" >
                                                                       {{ __('Website Title') }}
                                                                    </label>
                                                                    <input required name="website_name" value="{{ siteSetting('website_name') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Website Name') }}...">
                                                                        @error('website_name') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" >
                                                                       {{ __('Contact Number') }}
                                                                    </label>
                                                                    <input required name="contact" value="{{ siteSetting('contact') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Contact Number') }}...">
                                                                        @error('contact') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>


                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" >
                                                                       {{ __('Email Address') }}
                                                                    </label>
                                                                    <input required name="email" value="{{ siteSetting('email') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="email" placeholder="{{ __('Email Address') }}...">
                                                                        @error('email') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-0">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white" >
                                                                       {{__('Physical Address') }}
                                                                    </label>
                                                                    <input required name="address" value="{{ siteSetting('address') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{__('Physical Address') }}...">
                                                                        @error('address') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label
                                                                        class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white"
                                                                        for="grid-password">
                                                                       {{ __('About') }}
                                                                    </label>
                                                                    <input required name="about" value="{{ siteSetting('about') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{__('Short Description') }}...">
                                                                        @error('about') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}
                                                                        </p> @enderror
                                                                </div>
                                                            </div>
                                                       </div>
                                                  </div>

                                                  <div id="step-2" class="col-span-3 step-tab" style="display:none">
                                                       <div class="px-8">
                                                            <h4 class="text-2xl font-semibold mb-5 underline text-theme-primary-100 dark:text-white">
                                                                {{ __('Social Media') }}</h4>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                                       {{ __('Facebook') }}
                                                                    </label>
                                                                    <input required name="facebook" value="{{ siteSetting('facebook') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Facebook') }}...">
                                                                    @error('facebook') <p class="text-theme-danger-500 text-xs italic">
                                                                       {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                                      {{ __('Instagram') }}
                                                                    </label>
                                                                    <input required name="instagram" value="{{ siteSetting('instagram') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Instagram') }}...">
                                                                    @error('instagram') <p class="text-theme-danger-500 text-xs italic">
                                                                      {{__('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                                        {{ __('Twitter') }}
                                                                    </label>
                                                                    <input required name="twitter" value="{{ siteSetting('twitter') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Twitter') }}...">
                                                                    @error('twitter') <p class="text-theme-danger-500 text-xs italic">{{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-wrap -mx-3 mb-6">
                                                                <div class="w-full px-3">
                                                                    <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                                       {{ __('Youtube') }}
                                                                    </label>
                                                                    <input required name="youtube" value="{{ siteSetting('youtube') }}"
                                                                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                                        type="text" placeholder="{{ __('Youtube') }}...">
                                                                    @error('youtube') <p class="text-theme-danger-500 text-xs italic">
                                                                        {{ __('Please fill out this field.') }}</p> @enderror
                                                                </div>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                    </div>
                                    @can("$permission-update")
                                    <div class="row">
                                        <div class="col-md-12 mt-3 text-end">
                                            <x-primary-button class="ml-3 hover:bg-theme-primary-300">
                                               {{ __('Update') }}
                                            </x-primary-button>
                                        </div>
                                    </div>
                                    @endcan
                            @can("$permission-update")
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
    <script>
        function openTabs(tabsName) {
            var targ;
            var e = window.event;
            if (e.target) {
                targ = e.target;
                let buttons = targ.closest('.col-span-1').querySelectorAll("button");
                var div_list = buttons; // returns NodeList
                var div_array = [...div_list]; // converts NodeList to Array
                div_array.forEach(div => {
                    div.classList.remove("border-dark","border-4");
                })
                targ.closest('button').classList.add("border-dark","border-4");
            }
            else if (e.srcElement) {
                targ = e.srcElement;
                let buttons = targ.closest('.col-span-1').querySelectorAll("button");
                var div_list = buttons; // returns NodeList
                var div_array = [...div_list]; // converts NodeList to Array
                div_array.forEach(div => {
                    div.classList.remove("border-dark","border-4");
                })
                targ.closest('button').classList.add("border-dark","border-4");
            }
            if (targ.nodeType == 3) // defeat Safari bug
            {
                targ = targ.parentNode;
                let buttons = targ.closest('.col-span-1').querySelectorAll("button");
                var div_list = buttons; // returns NodeList
                var div_array = [...div_list]; // converts NodeList to Array
                div_array.forEach(div => {
                    div.classList.remove("border-dark","border-4");
                })
                targ.closest('button').classList.add("border-dark","border-4");
            }
            // console.log(targ)
            var i;
            var x = document.getElementsByClassName("step-tab");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(tabsName).style.display = "block";


        }
    </script>
    @endsection
</x-app-layout>
