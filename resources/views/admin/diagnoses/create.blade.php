<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Diagnoses
                </h2>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.diagnoses.index')">
                                All Diagnoses
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
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                   Create Diagnoses
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{ route('admin.diagnoses.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                                <label class="block mb-2 text-sm font-medium text-theme-primary-100 dark:text-white">
                                                    {{ __('Diagnose') }}
                                                </label>
                                                <input required="required" name="diagnose" value="{{ old('diagnose') }}"
                                                    class="bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                    type="text" placeholder="{{ __('Please enter diagnose here') }}...">
                                                @error('diagnose')
                                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                                @enderror

                                            </div>
                                            <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                                                <x-primary-button>
                                                    {{ __('Create') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
