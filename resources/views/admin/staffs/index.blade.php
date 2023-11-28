<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-secondary-100 dark:text-white">
                    All Data Opertor
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3 text-theme-secondary-100" :href="route('admin.staff.create')">
                                Create Data Opertor
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
                                    Data Opertor
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="staff-datatable" style="width: 100%"
                                    class="w-full text-sm text-left text-theme-secondary-100 dark:text-theme-secondary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr class="rounded-xl">
                                           <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" >{{ __('Email') }}</th>
                                            @if(Auth::user()->role_id == 1)
                                            <th scope="col" class="px-3 py-3 w-1/6" >{{ __('Province') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" >{{ __('Hospital') }}</th>
                                             @elseif(Auth::user()->role_id == 2)
                                            <th scope="col" class="px-3 py-3 w-1/6">{{ __('Hospital') }}</th>
                                            @endif
                                            <th scope="col" class="px-3 py-3 w-1/6" >{{ __('Created At') }}</th>
                                            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center " style="text-align: center;">{{
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

    @section('scripts')
    <script>
        $(document).ready(function() {
                    "use strict";
                    var staff_table = $('#staff-datatable').DataTable({
                        responsive: true,

                        // "aaSorting": [
                        //     [0, "asc"]
                        // ],
                         "columnDefs": [
                        { "orderable": true, "targets": '_all' },
                        {
                            className: "text-center",
                            targets: [3]
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
                        'serverMethod': 'post',
                        'ajax': {
                            'headers': {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            'url': "{{ route('admin.staff.list') }}",
                            'data': function(data) {}
                        },
                        'columns': [{
                                data: 'name'
                            },
                            {
                                data: 'email'
                            },
                            @if (Auth::user()->role_id == 1)
                                {
                                data: 'state_id'
                                },
                                {
                                data: 'parent_id'
                                },
                            @elseif(Auth::user()->role_id == 2)
                                {
                                    data: 'parent_id'
                                },
                            @endif
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
                        $('#staff-datatable_previous').addClass(
                            'flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto'
                            ).removeClass('paginate_button');
                        $('#staff-datatable_next').addClass(
                            'flex items-center justify-center  py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-secondary-100 '
                            ).removeClass('paginate_button');
                        $('.dataTables_paginate > span a').addClass(
                            'active flex items-center inline-flex justify-center  py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-secondary-100 '
                            ).removeClass('paginate_button');
                        $('.active.current').addClass('bg-theme-primary-300').removeClass(
                            'bg-theme-primary-500');
                            $('#staff-datatable_processing').addClass('bg-theme-primary-700 text-theme-success-100');
                    }

                    });

                    var searchInput = $('input[type="search"]').addClass(
                    'bg-theme-primary-400 border border-theme-success-200 text-theme-secondary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5  placeholder-theme-primary-100 '
                    ).attr('placeholder', 'Search Staff');
                    var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
                        .addClass('text-theme-secondary-100');
                    // paging_simple_numbers
                    var lengthSelect = $('.dataTables_length').find('select')
                        .addClass('bg-theme-primary-700 text-theme-secondary-100 border border-theme-success-200');
                    var lengthLabel = $('.dataTables_length').find('label')
                        .addClass('text-theme-secondary-100');

                    var searchLabel = $('.dataTables_filter').find('label')
                        .addClass('text-theme-secondary-100');
                    var totalShow = $('#staff-datatable_info')
                        .addClass('text-theme-secondary-100');

                    var lengthOptions = $('.dataTables_length').find('select option')
                        .addClass('text-theme-secondary-100');

                    var paginatButton = $('#staff-datatable_paginate')
                        .addClass('inline-flex');


                $('#staff-datatable_processing').hide();

                $('#staff-datatable')
                    .on('preXhr.dt', function(e, settings, data) {
                        $('#staff-datatable_processing').show();
                    })

                    .on('xhr.dt', function(e, settings, json, xhr) {
                        $('#staff-datatable_processing').hide();
                    });

                });
    </script>

    @endsection
</x-app-layout>


