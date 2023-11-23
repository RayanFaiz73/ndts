<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Patients
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.patients.create')">
                                Create Patient
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
                                    Patients
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class=" shadow-md sm:rounded-lg">
                                <table id="patient-datatable"
                                    class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Nic') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Age') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Disease') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Staff') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Hospital') }}</th>
                                            {{-- <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('DOB') }}</th> --}}
                                            {{-- <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('Created At') }}</th> --}}
                                            <th scope="col" class="px-3 py-3 w-1/6" style="text-align: center;">{{ __('PDF') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center " style="text-align: center;">{{ __('Actions') }}
                                            </th>
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
                var staff_table = $('#patient-datatable').DataTable({
                    responsive: true,

                    "aaSorting": [
                        [0, "asc"]
                    ],
                    "columnDefs": [{
                        "bSortable": false,
                        "aTargets": [0, 1, 2, 3, 4, 5, 6]
                    },
                    {
                        className: "text-center",
                        targets: [0, 1, 2, 3, 4, 5, 6]
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
                            columns: [0, 1, 2, 3, 4, 5, 6] //Your Colume value those you want
                        },
                        className: "btn-sm prints"
                    }, {
                        extend: "csv",
                        title: "ProductList",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] //Your Colume value those you want print
                        },
                        className: "btn-sm prints"
                    }, {
                        extend: "excel",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] //Your Colume value those you want print
                        },
                        title: "ProductList",
                        className: "btn-sm prints"
                    }, {
                        extend: "pdf",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] //Your Colume value those you want print
                        },
                        title: "ProductList",
                        className: "btn-sm prints"
                    }, {
                        extend: "print",
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6] //Your Colume value those you want print
                        },
                        title: "<center>StaffList</center>",
                        className: "btn-sm prints"
                    }],

                    'serverMethod': 'post',
                    'ajax': {
                        'headers': {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        'url': "{{ route('admin.patients.list') }}",
                        'data': function(data) {}
                    },
                    'columns': [
                        {
                            data: 'name'
                        },
                        {
                            data: 'nic'
                        },
                        {
                            data: 'age'
                        },
                         {
                            data: 'diagnoses_id'
                        },
                         {
                            data: 'staff_id'
                        },
                        {
                            data: 'parent'
                        },



                        // {
                        //     data: 'dob'
                        // },
                        // {
                        //     data: 'created_at'
                        // },
                        {
                            data: 'pdf'
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
                    $('#patient-datatable_previous').addClass(
                        'flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto'
                        ).removeClass('paginate_button');
                    $('#patient-datatable_next').addClass(
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
                ).attr('placeholder', 'Search patient');
                var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
                    .addClass('text-theme-primary-100');
                // paging_simple_numbers
                var lengthSelect = $('.dataTables_length').find('select')
                    .addClass('bg-theme-primary-700 text-theme-primary-100 border border-theme-success-200');
                var lengthLabel = $('.dataTables_length').find('label')
                    .addClass('text-theme-primary-100');

                var searchLabel = $('.dataTables_filter').find('label')
                    .addClass('text-theme-primary-100');
                var totalShow = $('#patient-datatable_info')
                    .addClass('text-theme-primary-100');

                var lengthOptions = $('.dataTables_length').find('select option')
                    .addClass('text-theme-primary-100');

                var paginatButton = $('#patient-datatable_paginate')
                    .addClass('inline-flex');


            $('#patient-datatable_processing').hide();

            $('#patient-datatable')
                .on('preXhr.dt', function(e, settings, data) {
                    $('#patient-datatable_processing').show();
                })

                .on('xhr.dt', function(e, settings, json, xhr) {
                    $('#patient-datatable_processing').hide();
                });

            });

            document.getElementById("downloadPdf").addEventListener("click", function() {
            window.location.href = "' . asset(Storage::url('pdf/'.$patient->pdf)) . '";
            });
        </script>

        @endsection
</x-app-layout>
