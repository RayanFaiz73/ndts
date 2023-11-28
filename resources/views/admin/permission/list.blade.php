<x-app-layout>
    <x-slot name="header">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-10">
                    <h2 class="text-3xl font-bold text-theme-secondary-100 dark:text-white">
                        {{ __($heading.'s')}}
                    </h2>
                    @can("$permission-create")
                    <div
                        class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                        <div class="relative ml-3">
                            <div>
                                <x-primary-link class="ml-3 text-theme-secondary-100" :href="route('admin.permission.create')">
                                    {{__('Create Role')}}
                                </x-primary-link>
                            </div>
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
    </x-slot>



    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-theme-primary-500  rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <div class="p-6 text-gray-900">
                    <div class="card">
                        <div class="card-body">
                            <div class="flex flex-wrap mb-6">
                                @foreach ($roles as $role)
                                    <div class="w-full lg:w-6/12 px-3 mb-6 lg:mb-6">
                                        <x-permission-card :role="$role" :permission="$permission">
                                        </x-permission-card>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    <div id="deleteModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-theme-primary-700 rounded-lg shadow dark:bg-gray-700">
                <button onclick="closeDeleteModal()" type="button"
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
                <div class="px-6 py-4 border-b rounded-t border-theme-success-200">
                    <h3 class="text-base font-semibold text-theme-secondary-100 lg:text-xl dark:text-white">
                        {{__('Delete Role ?')}}
                    </h3>
                </div>
                <!-- Modal body -->
                <form action="{{ route('admin.permission.destroy') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="name" id="name" value="">
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-theme-secondary-100 dark:text-gray-400">
                        {{__('Are you sure you want to delete this role?')}}</h3>
                        <button type="submit"
                            class="text-white bg-theme-danger-600 hover:bg-theme-danger-800 focus:ring-4 focus:outline-none focus:ring-theme-danger-300 dark:focus:ring-theme-danger-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          {{__('Yes, I am sure')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main modal -->
    <div id="viewModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto lg:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-theme-primary-500 rounded-lg shadow dark:bg-gray-700">
                <button onclick="closeViewModal()" type="button"
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
                <div class="px-6 py-4 border-b rounded-t border-theme-success-200">
                    <h3 class="text-base font-semibold text-theme-secondary-100 lg:text-xl dark:text-white">
                        {{__('View Role ?')}}
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-6 bg-theme-primary-500 rounded-b-lg " id="dataResult">
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            let deleteModalEl = document.getElementById('deleteModal');
            let viewModalEl = document.getElementById('viewModal');
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
            openDeleteModal = (id, name) => {
                let myModal = new Modal(deleteModalEl, options);
                document.getElementById('id').value = id;
                document.getElementById('name').value = name;
                myModal.show();
            }
            closeDeleteModal = () => {
                let myModal = new Modal(deleteModalEl, options);
                myModal.hide();
                document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.remove());
            }
            openViewModal = (id, name) => {
                let myModal = new Modal(viewModalEl, options);
                var url = "{{ route('admin.permission.view', ':id') }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: "GET",
                    cache: false,
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(dataResult) {
                        $('#dataResult').html(dataResult)
                    }
                });
                myModal.show();
            }
            closeViewModal = () => {
                let myModal = new Modal(viewModalEl, options);
                myModal.hide();
                document.querySelectorAll('[modal-backdrop]').forEach((elem) => elem.remove());
            }
        </script>
    @endsection

</x-app-layout>
