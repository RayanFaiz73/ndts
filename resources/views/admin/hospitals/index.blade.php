<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-secondary-100 dark:text-white">
                    All Hospital
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 text-theme-secondary-100"
                                :href="route('admin.hospitals.create')">
                                Create Hospital
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
                                <h2 class="text-2xl font-bold text-theme-secondary-100 dark:text-white">
                                    Hospital
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="hospital-datatable" style="width: 100%"
                                    class="w-full text-sm text-left text-theme-secondary-100 dark:text-theme-secondary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr class="rounded-xl">
                                            <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6 text-center">{{
                                                __('Hospital Name') }}</th>
                                            @if(Auth::user()->role_id == 1)
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Province') }}
                                            </th>
                                            @else

                                            @endif
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Email') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Type') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Phone') }}</th>
                                            {{-- <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Created At')
                                                }} --}}
                                            </th>
                                            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center "
                                                style="text-align: center;">{{
                                                __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="popup-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-1/2 max-w-1/2 max-h-full">
            <div class="relative bg-theme-primary-500 rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-theme-success-200">
                    <h3 class="text-xl font-semibold text-theme-secondary-100 dark:text-white">
                        Hospital Information
                    </h3>
                    <button type="button" id="hide-modal"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="px-6 py-6 lg:px-8 content-center">
                    <div id="popup-modal-content">

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        "use strict";
        var tax_table = $('#hospital-datatable').DataTable({
            responsive: true,

            // "aaSorting": [
            //     [0, "asc"]
            // ],
           "columnDefs": [
                        { "orderable": true, "targets": '_all' },
                        // {
                        //     className: "text-center",
                        //     targets: [3]
                        // },
                        {
                            "targets": [-1],
                            "createdCell": function(td, cellData, rowData, row, col) {
                                $(td).eq(-1).addClass('flex justify-center text-center');
                            }
                        }
                    ],
            'processing': true,
            'serverSide': true,


            'lengthMenu': [
                [10, 25, 50, 100, 250, 500, 1000],
                [10, 25, 50, 100, 250, 500, "All"]
            ],
            dom: '<"flex flex-row items-center justify-between"<"filter"l><"filter"f>>rtip',
            buttons: [{
                extend: "copy",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] //Your Colume value those you want
                },
                className: "btn-sm prints"
            }, {
                extend: "csv",
                title: "CityList",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] //Your Colume value those you want print
                },
                className: "btn-sm prints"
            }, {
                extend: "excel",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] //Your Colume value those you want print
                },
                title: "CityList",
                className: "btn-sm prints"
            }, {
                extend: "pdf",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] //Your Colume value those you want print
                },
                title: "CityList",
                className: "btn-sm prints"
            }, {
                extend: "print",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4] //Your Colume value those you want print
                },
                title: "<center>CitiesList</center>",
                className: "btn-sm prints"
            }],

            'serverMethod': 'post',
            'ajax': {
                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                'url': "{{ route('admin.hospitals.list') }}",
                'data': function(data) {}
            },
            'columns': [{
                    data: 'data_name',
                },
                @if(Auth::user()->role_id == 1) {
                    data: 'state_id'
                },
                @endif
                {
                    data: 'name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'type'
                },
                {
                    data: 'phone'
                },
                // {
                //     data: 'created_at'
                // },
                {
                    data: 'options'
                },

            ],
            "drawCallback": function () {
            $('.paginate_button.current').addClass('bg-theme-primary-100').removeClass('bg-theme-primary-500');
            $('#hospital-datatable_previous').addClass('flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto').removeClass('paginate_button');
            $('#hospital-datatable_next').addClass('flex items-center justify-center  py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-secondary-100 ').removeClass('paginate_button');
            $('.dataTables_paginate > span a').addClass('active flex items-center inline-flex justify-center  py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-secondary-100 ').removeClass('paginate_button');
            $('.active.current').addClass('bg-theme-primary-300').removeClass('bg-theme-primary-500');
            $('#hospital-datatable_processing').addClass('bg-theme-primary-700 text-theme-success-100');
            }

        });
        var searchInput = $('input[type="search"]').addClass('bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5  placeholder-theme-primary-100 ') .attr('placeholder', 'Search Hospital');
        var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
        .addClass('text-theme-secondary-100');
// paging_simple_numbers
        var lengthSelect = $('.dataTables_length').find('select')
        .addClass('bg-theme-primary-700 text-theme-secondary-100 border border-theme-success-200');
        var lengthLabel = $('.dataTables_length').find('label')
        .addClass('text-theme-secondary-100');

        var searchLabel = $('.dataTables_filter').find('label')
        .addClass('text-theme-secondary-100');
        var totalShow = $('#hospital-datatable_info')
        .addClass('text-theme-secondary-100');

        var lengthOptions = $('.dataTables_length').find('select option')
        .addClass('text-theme-secondary-100');

        var paginatButton = $('#hospital-datatable_paginate')
        .addClass('inline-flex');


        $('#hospital-datatable_processing').hide();

        $('#hospital-datatable')
        .on('preXhr.dt', function(e, settings, data) {
            $('#hospital-datatable_processing').show();
        })

        .on('xhr.dt', function(e, settings, json, xhr) {
            $('#hospital-datatable_processing').hide();
        });
    });

     function detailsInfo(element) {
        const $targetEl = document.getElementById('popup-modal');
        const modal = new Modal($targetEl);
        $('#popup-modal-content').html('');

        var id = $(element).data('id');
        // console.log(id);

        modal.show();

        // Assuming you have a route like 'admin.diagnoses.details'
        $.get('{{ route('admin.hospitals.modal', ':id') }}'.replace(':id', id), function (data) {
            $('#popup-modal-content').html(data);

            $('#hide-modal').click(function (e) {
                e.preventDefault();
                modal.hide();
            });
        });
            }
</script>
