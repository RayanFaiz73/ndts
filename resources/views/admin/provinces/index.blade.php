<x-app-layout>
    @section('styles')
    <style>
        .asds{
            color: #fff;
        }
    </style>
    @endsection
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Province
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.provinces.create')">
                                Create Province
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
                                    Province
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="province-datatable" style="width: 100%"
                                    class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr class="rounded-xl">
                                            <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6"
                                                style="text-align: center;">{{ __('Province') }}</th>
                                            <th scope="col" class=" px-3 py-3 w-1/6 text-center"
                                                style="text-align: center;">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center"
                                                style="text-align: center;">{{ __('Email') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center"
                                                style="text-align: center;">{{ __('Hospitals') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center"
                                                style="text-align: center;">{{ __('Created At') }}</th>
                                            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6"
                                                style="text-align: center;">{{ __('Actions') }}</th>
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
    @section('scripts')
    <script>
            $(document).ready(function() {
                "use strict";
                var tax_table = $('#province-datatable').DataTable({
                    responsive: true,

                    "aaSorting": [
                        [0, "asc"]
                    ],
                    "columnDefs": [{
                            "bSortable": false,
                            "aTargets": [5]
                        },
                        {
                            className: "text-center",
                            targets: [0, 1, 2, 3, 4]
                        },
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
                        'url': "{{ route('admin.provinces.list') }}",
                        'data': function(data) {}
                    },
                    'columns': [{
                            data: 'data_name',
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'parent_id'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'options'
                        },

                    ],
                    "drawCallback": function() {
                        console.log('object')
                        console.log($('.paginate_button.current'))
                        $('.paginate_button.current').addClass('bg-theme-primary-100').removeClass(
                            'bg-theme-primary-500');
                        $('#province-datatable_previous').addClass(
                            'flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto'
                            ).removeClass('paginate_button');
                        $('#province-datatable_next').addClass(
                            'flex items-center justify-center  py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 '
                            ).removeClass('paginate_button');
                        $('.dataTables_paginate > span a').addClass(
                            'active flex items-center inline-flex justify-center  py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 '
                            ).removeClass('paginate_button');
                        $('.active.current').addClass('bg-theme-primary-300').removeClass(
                            'bg-theme-primary-500');
                    }

                });
                var searchInput = $('input[type="search"]').addClass(
                    'bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5  placeholder-theme-primary-100 '
                    ).attr('placeholder', 'Search Province');
                var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
                    .addClass('text-theme-primary-100');
                // paging_simple_numbers
                var lengthSelect = $('.dataTables_length').find('select')
                    .addClass('bg-theme-primary-700 text-theme-primary-100 border border-theme-success-200');
                var lengthLabel = $('.dataTables_length').find('label')
                    .addClass('text-theme-primary-100');

                var searchLabel = $('.dataTables_filter').find('label')
                    .addClass('text-theme-primary-100');
                var totalShow = $('#province-datatable_info')
                    .addClass('text-theme-primary-100');

                var lengthOptions = $('.dataTables_length').find('select option')
                    .addClass('text-theme-primary-100');

                var paginatButton = $('#province-datatable_paginate')
                    .addClass('inline-flex');


                $('#province-datatable_processing').hide();

                $('#province-datatable')
                    .on('preXhr.dt', function(e, settings, data) {
                        $('#province-datatable_processing').show();
                    })

                    .on('xhr.dt', function(e, settings, json, xhr) {
                        $('#province-datatable_processing').hide();
                    });
            });
    </script>
    @endsection
</x-app-layout>
