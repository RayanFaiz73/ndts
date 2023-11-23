<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-800 dark:text-white">
                    {{ __($heading.'s')}}
                </h2>
                @can("$permission-read")
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
                @endcan
            </div>
        </div>
    </x-slot>


    @can("$permission-update")
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 py-3">
                                <h2 class="text-2xl font-bold text-theme-primary-800 dark:text-white">
                                    {{ __('Update '.$heading)}}
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <form class="w-full" action="{{route('admin.user.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$user->id}}">
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Name') }}
                                        </label>
                                        <input  required="required" name="name" value="{{old('name',$user->name)}}"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="text" placeholder="{{ __('Please enter name here') }}...">
                                        @error('name') <p class="text-theme-danger-500 text-xs italic">{{$message}}</p> @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Email') }}
                                        </label>
                                        <input  required="required" name="email" value="{{old('email',$user->email)}}" autocomplete="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="email" placeholder="{{ __('Please enter email address here') }}...">
                                        @error('email') <p class="text-theme-danger-500 text-xs italic">{{$message}}</p> @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Password') }}
                                        </label>
                                        <input name="password" value="{{old('password')}}" autocomplete="new-password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password here') }}...">
                                        @error('password') <p class="text-theme-danger-500 text-xs italic">{{$message}}</p> @enderror
                                    </div>
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Confirm Password') }}
                                        </label>
                                        <input name="password_confirmation" value="{{old('password_confirmation')}}" autocomplete="confirm-password"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                            type="password" placeholder="{{ __('Please enter password again') }}...">
                                        @error('password_confirmation') <p class="text-theme-danger-500 text-xs italic">{{$message}}</p> @enderror
                                    </div>
                                    {{-- <input type="hidden" name="created_by" id="created_by" value="{{$user->created_by}}"> --}}
                                        <div class="contents" id="rolesDiv">
                                            @php
                                                $oldRole = $user->roles->first();
                                            @endphp
                                            <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ __('Role') }}
                                                </label>
                                                <select  required="required" name="role_id" id="role_id"
                                                    onChange="getManagers(this)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                    <option value=""> {{ __('select role') }} </option>
                                                    @foreach ($role_news as $role)
                                                        <option value="{{$role->id}}" @if(old('role_id',$oldRole->id) == $role->id) selected @endif > {{$role->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if ($oldRole->id > 2)

                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ __('Select Manager') }}
                                                    </label>
                                                    <select name="parent" required="required" onChange="getUsers(this)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                        <option value="" > {{ __('Please select any option') }} </option>
                                                        @foreach ($managers as $manager)
                                                            @if ($oldRole->id == 4)
                                                                @if ($user->parent)
                                                                    <option value="{{$manager->id}}" @if($user->parent?->parent_id == $manager->id) selected @endif > {{$manager->name}} </option>
                                                                @else
                                                                    <option value="{{$manager->id}}" > {{$manager->name}} </option>
                                                                @endif
                                                            @else
                                                                <option value="{{$manager->id}}" @if($user->parent_id == $manager->id) selected @endif > {{$manager->name}} </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($oldRole->id == 4)
                                                <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                                    <label
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ __('Select Client') }}
                                                    </label>
                                                    <select name="parent" required="required" onChange="getUsers(this)"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                                        <option value="" > {{ __('Please select any option') }} </option>
                                                        @if ($oldRole->id == 4 && $user->parent)
                                                            <option value="{{$user->parent_id}}" selected> {{$user->parent?->name}} </option>
                                                        @endif
                                                    </select>
                                                </div>
                                                @endif
                                            @endif
                                        </div>
                                        <div
                                        class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if (old('role_id' != 3)) hidden @elseif($oldRole->id != 3) hidden @endif"
                                        {{-- class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if (old('role_id' != 3)) hidden @elseif($user->role_id != 3) hidden @endif" --}}
                                        {{-- class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3 @if (old('role_id' != 4)) hidden @elseif($user->role_id != 4) hidden @endif" --}}
                                            id="divCertificates">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                {{ __('Certificates') }}
                                            </label>
                                            @php
                                                $userCertificates =[];
                                                if($user->certificateUsers()->exists()){
                                                    foreach($user->certificateUsers as $data){
                                                        $userCertificates[] = [
                                                            "value" => $data->certificate->name,
                                                            "title" => $data->id,
                                                        ];
                                                    }
                                                }
                                                $userCertificates = json_encode($userCertificates);
                                            @endphp
                                            <input name="certificates"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500"
                                                value="{{old('certificates',$userCertificates)}}">
                                            @error('certificates')
                                                <p class="text-theme-danger-500 text-xs italic">{{ $message }}</p>
                                            @enderror

                                        </div>
                                    {{-- @endif --}}
                                    <div class="w-full lg:w-1/2 px-3 mb-6 lg:mb-3">
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            {{ __('Status') }}
                                        </label>
                                        <select  required="required" name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-theme-primary-500 dark:focus:border-theme-primary-500">
                                            <option value="" >{{ __('select status') }}</option>
                                            @foreach(App\Models\User::STATUS_SELECT as $key => $label)
                                                <option value="{{ $key }}" {{ old('status', $user->status) === (string) $key ? 'selected' : '' }}>{{ __($label) }}</option>
                                            @endforeach
                                        </select>
                                        @error('status') <p class="text-theme-danger-500 text-xs italic">{{$message}}</p> @enderror
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
    @endcan


    @can("$permission-read")
    @if ($user->certificateUsers()->exists())
    <div class="pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-header">
                            <div class="heading-1 pb-3">
                                <h2 class="text-2xl font-bold text-theme-primary-800 dark:text-white">
                                    {{ __('Certificates') }}
                                    @if ($count = count($user->certificateUsers->where('status','requested')))
                                    <span class="text-lg font-bold text-theme-warning-500 dark:text-gray-400">( {{ __('New') }} {{$count}} )</span>
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-600 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-3 py-3 w-1/5">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/5">{{ __('Status') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/5">{{ __('Created At') }}</th>
                                            @can("$permission-update")
                                            <th scope="col" class="px-3 py-3 w-1/5 text-center">{{ __('Actions') }}</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->certificateUsers as $data)
                                            <tr class="bg-theme-primary-500 border-b border-theme-primary-400">
                                                <td scope="row" class="px-3 py-3 font-medium text-theme-primary-50 whitespace-nowrap dark:text-theme-primary-100">
                                                    <div>
                                                        <div class="text-base font-bold">{{ $data->certificate->name }} ({{ $data->certificate->certificateType->name }})</div>
                                                        <div class="font-semibold text-theme-success-300">
                                                            {{__(App\Models\CertificateUser::REVERIFY_SELECT[$data->certificate->reverify])}}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-3 py-3">
                                                    @if ($data->status == 'requested')
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-warning-800 bg-theme-warning-300 rounded dark:bg-theme-warning-900 dark:text-theme-warning-300">
                                                            <i class="fas fa-clock mx-3 text-theme-warning-800"></i> {{__(App\Models\CertificateUser::STATUS_SELECT[$data->status])}}
                                                        </span>
                                                    @elseif ($data->status == 'accepted')
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-success-800 bg-theme-success-300 rounded dark:bg-theme-success-900 dark:text-theme-success-300">
                                                            <i class="fas fa-check mx-3 text-theme-success-800 dark:text-theme-success-300"></i> {{__(App\Models\CertificateUser::STATUS_SELECT[$data->status])}}
                                                        </span>
                                                    @else
                                                        <span
                                                            class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium text-theme-danger-800 bg-theme-danger-300 rounded dark:bg-theme-danger-900 dark:text-theme-danger-300">
                                                            <i class="fas fa-xmark mx-3 text-theme-danger-800 dark:text-theme-danger-300"></i> {{__(App\Models\CertificateUser::STATUS_SELECT[$data->status])}}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-3 py-3">{{ \Carbon\Carbon::parse($data->created_at)->toDayDateTimeString() }}</td>
                                                @can("$permission-update")
                                                <td class="px-3 py-3 text-center">
                                                    <x-primary-button class="w-full justify-center bg-theme-danger-600 hover:bg-theme-danger-900 focus:bg-theme-danger-900 active:bg-theme-danger-600" type="button"
                                                        value="{{ $data->status }}" onclick="openUserModal({{ $data->id }},'{{ $data->status }}')">
                                                        <i class="fas fa-user-gear mr-2"></i>
                                                        {{ __('Change status ?')}}
                                                    </x-primary-button>
                                                </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endcan

    @can("$permission-update")
    <!-- Main modal -->
    <div id="changeStatusModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button onclick="closeUserModal()" type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        {{ __('Change Status') }}
                    </h3>
                </div>
                <!-- Modal body -->
                <form action="{{ route('admin.user.statusForCertificate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="requested-certificate-id" value="">
                    <div class="p-6">
                        <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
                            {{ __('Only approved user can able to login.') }}
                        </p>
                        <ul class="my-4 space-y-3">
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-clock mx-3 text-theme-warning-800"></i>
                                    <input id="status-requested" type="radio" required value="requested"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-requested"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__(App\Models\CertificateUser::STATUS_SELECT['requested'])}}</label>
                                </span>
                            </li>
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-check mx-3 text-theme-success-800 dark:text-theme-success-300"></i>
                                    <input id="status-accepted" type="radio" required value="accepted"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-accepted"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__(App\Models\CertificateUser::STATUS_SELECT['accepted'])}}</label>
                                </span>
                            </li>
                            <li>
                                <span
                                    class="flex items-center text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <i class="fas fa-user-xmark mx-3 text-theme-danger-800 dark:text-theme-danger-300"></i>
                                    <input id="status-rejected" type="radio" required value="rejected"
                                        name="status" required
                                        class="w-4 h-4 text-theme-info-600 bg-gray-100 border-gray-300 rounded focus:ring-theme-info-500 dark:focus:ring-theme-info-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                    <label for="status-rejected"
                                        class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__(App\Models\CertificateUser::STATUS_SELECT['rejected'])}}</label>
                                </span>
                            </li>
                        </ul>
                        <div>
                            <x-primary-button
                                class="w-full justify-center bg-theme-danger-600 hover:bg-theme-danger-900 focus:bg-theme-danger-900 active:bg-theme-danger-600">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @section('scripts')

    <script>
        // self executing function here
        let modalEl = document.getElementById('changeStatusModal');
        const options = {
            placement: 'center',
            backdrop: 'dynamic',
            backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40',
            closable: true,
            onHide: () => {
                // console.log('modal is hidden');
                document.querySelectorAll('input[type=radio]').forEach(el => el.checked = false);
            },
            onShow: () => {
                // console.log('modal is shown');
            },
            onToggle: () => {
                // console.log('modal has been toggled');
            }
        };
        openUserModal = (id, status) => {
            let myModal = new Modal(modalEl, options);
            document.getElementById('requested-certificate-id').value = id;
            document.getElementById(`status-${status}`).checked = true;
            myModal.show();
        }
        closeUserModal = () => {
            let myModal = new Modal(modalEl, options);
            myModal.hide();
            document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.remove());
        }
    </script>
    <script>

        var managers = `<option value=""> {{ __('Please select any option') }} </option>`;
        @foreach ($managers as $manager)
            managers += `<option value="{{$manager->id}}" @if(old('manager_id') == $manager->id) selected @endif > {{$manager->name}} </option>`;
        @endforeach

        var role_id = {{ $user->roles->first()->id }};
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
                    id: id - 1,
                    user:{{$user->id}}
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
                        required:"required",
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
                    role_id:role_id,
                    user:{{$user->id}}
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
                            required:"required",
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
        @if (Auth::user()?->roles->first()->name == 'Admin' || Auth::user()?->roles->first()->id == 1 )
        showDropdowns = (el) => {
            let selecetedIndex = el.selectedIndex;
            let selectedOption = el.options[selecetedIndex];
            let value = selectedOption.value;
            let roleName = selectedOption.text;
            var lastValue = el.options[el.options.length - 1].value;
            if(value){
                roleName = roleName.toLowerCase();
                let newValue = value - 1;
                for (var i = 0; i < newValue; i++) {
                    $("#divHidden"+i).removeClass('hidden');
                    $("#select_"+i).attr('required', 'required');
                }
                for (var j = newValue; j <= lastValue; j++) {
                    $("#divHidden"+j).addClass('hidden');
                    $("#select_"+j).removeAttr('required').empty().append(`<option value=""> Please select any option </option>`);
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
            console.log(roleName)
        };
        getParentChilds = (el,hiddenElem,selectElem,required = true) => {
            let id = el.value;
            $("#select_"+selectElem).empty();
            $("#select_"+selectElem).append(`<option value=""> Please select any option </option>`);
            if(!id){
                // $("#created_by").val("");
                return;
            }
            // $("#created_by").val(id);
            $("#select_"+selectElem).empty();
            var url = "{{ route('admin.user.children') }}";
            $.ajax({
                url: url,
                type: "POST",
                cache: false,
                data: {
                    id:id
                },
                success: function(dataResult) {
                    $("#select_"+selectElem).append(dataResult.options);
                }
            });
        }
        @endif
            let whitelist = {!! $certificates !!};
            // ApexCharts options and config
            window.addEventListener("load", function() {

                var input = document.querySelector('input[name=certificates]'),
                    tagify = new Tagify(input, {
                        // pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
                        // delimiters: ",| ", // add new tags when a comma or a space character is entered
                        trim: false, // if "delimiters" setting is using space as a delimeter, then "trim" should be set to "false"
                        keepInvalidTags: false, // do not remove invalid tags (but keep them marked as invalid)
                        createInvalidTags: false,
                        // editTags: {
                        //     clicks: 2, // single click to edit a tag
                        //     keepInvalid: false // if after editing, tag is invalid, auto-revert
                        // },
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
