<!DOCTYPE html>
@extends('layouts.marketplace')
@section('content')
    {{-- <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet"> --}}
    <style>
        /* Custom styles for the table */
        #myTable {
            width: 100%;
            border-collapse: collapse;
        }

        /* Custom styles for table headers */
        #myTable th {
            padding: 12px;
            /* background-color: #F3F4F6; */
            border-bottom: 2px solid #E5E7EB;
            text-align: left;
        }

        /* Custom styles for table cells */
        #myTable td {
            padding: 12px;
            border-bottom: 1px solid #E5E7EB;
        }

        /* Alternate row background color */
        /* #myTable tbody tr:nth-child(even) {
                                                                                                                                                                                background-color: #F9FAFB;
                                                                                                                                                                            }

                                                                                                                                                                            /* Hover effect on rows */
        #myTable tbody tr:hover {
            /* background-color: #EFF6FF; */
        }

        #datatable-search_filter>label>input[type=search] {
            padding: 3px;
            margin: 25px;
            border-radius: 11px;
        }

        #datatable-search_length {
            border-radius: 11px;

            align-content: center;
        }

        .table-responsive {
            padding: 50px !important;
        }

        #datatable-search {
            width: -webkit-fill-available !important;
        }

        #datatable-search_wrapper {
            display: flex !important;
            flex-wrap: wrap !important;
            justify-content: space-between !important;
        }

        #datatable-search {
            border: 2px solid;
            margin-bottom: 30px;
        }

        .table-responsive {
            color: white !important;
            cursor: pointer;
        }

        .paginate_button {
            padding: 10px !important;
            cursor: pointer;
        }

        #datatable-search_length>label>select {
            width: 80px;
            margin: 7px;
            border-radius: 11px;
        }

        */
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <h1 class="text-5xl font-bold mb-8 text-center">Crop Price Page</h1>
    <div class="table-responsive">
        <table class="table" datatable id="datatable-search">
            <thead class="">
                <tr>
                    <th>State</th>
                    <th>District</th>
                    <th>Market</th>
                    <th>Commodity</th>
                    <th>Variety</th>
                    <th>Arrival Date</th>
                    <th>Min Price</th>
                    <th>Max Price</th>
                    <th>Modal Price</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#datatable-search').DataTable({
                "ajax": {
                    "url": "/cropsPrice",
                    "dataSrc": "data"
                },
                "columns": [{
                        "data": "state"
                    },
                    {
                        "data": "district"
                    },
                    {
                        "data": "market"
                    },
                    {
                        "data": "commodity"
                    },
                    {
                        "data": "variety"
                    },
                    {
                        "data": "arrival_date"
                    },
                    {
                        "data": "min_price"
                    },
                    {
                        "data": "max_price"
                    },
                    {
                        "data": "modal_price"
                    }
                ],
                // "stripeClasses": ['bg-gray-50', 'bg-white'], // Alternate row background colors
                "paging": true,
                "lengthMenu": [10, 25, 50, 100], // Show options for number of rows per page
                "order": [
                    [6, 'desc']
                ] // Initial sorting by Arrival Date (assuming it's the 7th column)

            });
        });
    </script>


@stop
