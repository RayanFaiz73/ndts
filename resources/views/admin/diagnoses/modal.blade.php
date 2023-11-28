<form class="w-full" action="{{ route('admin.diagnoses.update',$diagnose->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full lg:w-8/12 px-3 mb-6 lg:mb-3">
                    <label class="block mb-2 text-sm font-medium text-theme-secondary-100 dark:text-white">
                        {{ __('Name') }}
                    </label>
                    <input required="required" name="diagnose" value="{{ old('diagnose',$diagnose->diagnose) }}"
                        class="bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg
                        focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                        placeholder-theme-primary-100 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                        type="text" placeholder="{{ __('Please enter diagnoses here') }}...">
                    @error('name')
                    <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                    @enderror

                </div>
                <div class="flex items-center justify-between -mx-3 mb-2 my-5 px-3">

                    <x-primary-button>
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </div>
        </div>
    </div>


</form>
