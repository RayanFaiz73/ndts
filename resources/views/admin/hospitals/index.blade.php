{{-- <x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Hospitals
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.hospitals.create')">
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
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    Hospital
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="myTable"
                                    class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr class="rounded-xl">
                                            <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6 text-center">{{
                                                __('Hospital Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Email') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Type') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Phone') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ __('Created At') }}
                                            </th>
                                            <th scope="col" class="rounded-r-lg px-3 py-3 w-1/6 text-center ">{{
                                                __('Actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hospitals as $key => $value)
                                        <tr>
                                            <th scope="col" class="px-3 py-3 w-1/12 text-center">{{ $value->data_name ?
                                                $value->data_name: '--' }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/12 text-center">{{ $value->name ?
                                                $value->name : '--' }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/12 text-center">{{ $value->email ?
                                                $value->email : '--' }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/12 text-center">{{ $value->type ?
                                                $value->type : '--' }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/12 text-center">{{ $value->phone ?
                                                $value->phone : '--' }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">{{ date('d-m-Y',
                                                strtotime($value->created_at));}}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center">
                                                <a href="{{route('admin.hospitals.edit',$value->id)}}"
                                                    data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal" type="button"
                                                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                                                    <svg class="w-6 h-6 text-theme-success-200 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="currentColor" viewBox="0 0 20 18">
                                                        <path
                                                            d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                        <path
                                                            d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                    </svg>
                                                </a>
                                                <a href="{{route('admin.hospitals.destroy',$value->id)}}"
                                                    data-modal-target="authentication-modal"
                                                    data-modal-toggle="authentication-modal" type="button"
                                                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                                                    <svg class="w-6 h-6 text-theme-danger-500 dark:text-white"
                                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 18 20">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                    </svg>
                                                </a>
                                            </th>
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
</x-app-layout>
<script>
    let table = new DataTable('#myTable');
</script> --}}

<x-app-layout>
    <x-slot name="header">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-10">
                <h2 class="text-3xl font-bold text-theme-primary-100 dark:text-white">
                    All Hospitals
                </h2>
                <div
                    class="lg:absolute lg:inset-y-0 lg:right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    <div class="relative ml-3">
                        <div>
                            <x-primary-link class="ml-3" :href="route('admin.hospitals.create')">
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
                                <h2 class="text-2xl font-bold text-theme-primary-100 dark:text-white">
                                    Hospital
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="ajax-datatable" class="overflow-x-auto shadow-md sm:rounded-lg">
                                <table id="hospital-datatable" style="width: 100%"
                                    class="w-full text-sm text-left text-theme-primary-100 dark:text-theme-primary-100">
                                    <thead class="text-xs text-white uppercase bg-theme-primary-300 dark:text-white">
                                        <tr class="rounded-xl">
                                           <th scope="col" class="rounded-l-lg px-3 py-3 w-1/6 text-center">{{
                                                __('Hospital Name') }}</th>
                                                @if(Auth::user()->role_id == 1)
                                                   <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Province') }}</th>
                                                @else

                                                @endif
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Name') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Email') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Type') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Phone') }}</th>
                                            <th scope="col" class="px-3 py-3 w-1/6 text-center" style="text-align: center;">{{ __('Created At') }}
                                            </th>
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
</x-app-layout>


<script>
    $(document).ready(function() {
        "use strict";
        var tax_table = $('#hospital-datatable').DataTable({
            responsive: true,

            "aaSorting": [
                [0, "asc"]
            ],
            "columnDefs": [{
                "bSortable": false,
                "aTargets": [5]
            },
            { className: "text-center", targets: [0, 1, 2, 3, 4, 5] },
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
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want
                },
                className: "btn-sm prints"
            }, {
                extend: "csv",
                title: "CityList",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                className: "btn-sm prints"
            }, {
                extend: "excel",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                title: "CityList",
                className: "btn-sm prints"
            }, {
                extend: "pdf",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
                },
                title: "CityList",
                className: "btn-sm prints"
            }, {
                extend: "print",
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5] //Your Colume value those you want print
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
                    data: 'parent'
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
                {
                    data: 'created_at'
                },
                {
                    data: 'options'
                },

            ],
            "drawCallback": function () {
                console.log('object')
                console.log($('.paginate_button.current'))
            $('.paginate_button.current').addClass('bg-theme-primary-100').removeClass('bg-theme-primary-500');
            $('#hospital-datatable_previous').addClass('flex items-center justify-center h-full py-1.5 px-3  text-gray-200 bg-theme-primary-500 rounded-l-lg border border-theme-success-200 cursor-auto').removeClass('paginate_button');
            $('#hospital-datatable_next').addClass('flex items-center justify-center  py-1.5 px-3 leading-tight text-gray-200 bg-theme-primary-500 rounded-r-lg border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 ').removeClass('paginate_button');
            $('.dataTables_paginate > span a').addClass('active flex items-center inline-flex justify-center  py-2 px-3 leading-tight text-gray-200 bg-theme-primary-500 border border-theme-success-200 hover:bg-theme-primary-300 hover:text-theme-primary-100 ').removeClass('paginate_button');
            $('.active.current').addClass('bg-theme-primary-300').removeClass('bg-theme-primary-500');
            }

        });
        var searchInput = $('input[type="search"]').addClass('bg-theme-primary-400 border border-theme-success-200 text-theme-primary-100 text-sm rounded-lg focus:ring-theme-primary-500 focus:border-theme-primary-500 block w-full p-2.5  placeholder-theme-primary-100 ') .attr('placeholder', 'Search Hospital');
        var searchLabel = $('label[for="' + searchInput.attr('id') + '"]')
        .addClass('text-theme-primary-100');
// paging_simple_numbers
        var lengthSelect = $('.dataTables_length').find('select')
        .addClass('bg-theme-primary-700 text-theme-primary-100 border border-theme-success-200');
        var lengthLabel = $('.dataTables_length').find('label')
        .addClass('text-theme-primary-100');

        var searchLabel = $('.dataTables_filter').find('label')
        .addClass('text-theme-primary-100');
        var totalShow = $('#hospital-datatable_info')
        .addClass('text-theme-primary-100');

        var lengthOptions = $('.dataTables_length').find('select option')
        .addClass('text-theme-primary-100');

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
</script>
