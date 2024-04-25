<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Products') }}
        </h2>
    </x-slot>
    <!--Regular Datatables CSS-->
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <!--Responsive Extension Datatables CSS-->
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                    <div class="mx-auto bg-white rounded-md overflow-hidden shadow-md">
                        <div class="container mx-auto sm:px-4 max-w-full mx-auto sm:px-4 px-4 mb-5">
                            <div class="flex flex-wrap  pt-3">
                                <div class="xl:w-1/4 pr-4 md:w-1/2 m-2">
                                    <a class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 p-5"
                                        href="{{ route('farm.create') }}">Add farm
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex-auto p-6" style="padding-top:0px;">
                                <!--Card-->
                                <div id='recipients' class=" mt-6 lg:mt-0 rounded shadow bg-white">
                                    <table id="example" class="stripe hover"
                                        style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Farm Id</th>
                                                <th data-priority="2">Date From</th>
                                                <th data-priority="3">Date to</th>
                                                <th data-priority="5">Farmer Name</th>
                                                <th data-priority="6">Farmer PHone</th>
                                                <th data-priority="6">Rent</th>
                                                <th data-priority="6">Actions</th>
                                                <th data-priority="6">Actions</th>
                                                <th data-priority="6">Actions</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($farm_leases as $farm_lease)
                                                <tr>
                                                    {{-- @php
                                                        dd($farm_lease);
                                                    @endphp --}}
                                                    <td class="text-center">{{ $farm_lease->farm_id }}
                                                    </td>
                                                    <td class="text-center">{{ $farm_lease->date_from }}</td>
                                                    <td class="text-center">{{ $farm_lease->date_to }}</td>
                                                    <td class="text-center">{{ $farm_lease->farmer_name }}</td>
                                                    <td class="text-center">{{ $farm_lease->farmer_phone }}</td>
                                                    <td class="text-center">{{ $farm_lease->price }}</td>
                                                    <td class="text-center"><a class=""
                                                            href="{{ route('lease.edit', $farm_lease) }}"><i
                                                                class="fas fa-edit"></i>Edit</a>
                                                    <td class="text-center"><a class=""
                                                            href="{{ route('lease.show', $farm_lease) }}">View
                                                            More<i class="fas fa-arrow-right lg:px-2"></i></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <form method="post"
                                                            action="{{ route('lease.destroy', $farm_lease) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class=""
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>delete</button>
                                                        </form>
                                                    </td>
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
    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            })
            // .columns.adjust()
            // .responsive.recalc();
        });
    </script>
</x-app-layout>
