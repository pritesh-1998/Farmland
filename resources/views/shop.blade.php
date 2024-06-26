<!DOCTYPE html>
@extends('layouts.marketplace')
@section('content')
    <style>
        .selectBoxshop {
            height: calc(1.5em + 1rem + 2px);
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #687281;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            border-radius: 0.35rem;
            -webkit-transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-container {
            margin: 60px auto;
            padding-top: 0px;
            position: relative;
            width: 160px;

            .modal-btn {
                display: block;
                margin: 0 auto;
                color: #fff;
                width: 160px;
                height: 50px;
                line-height: 50px;
                background: #446CB3;
                font-size: 22px;
                border: 0;
                border-radius: 3px;
                cursor: pointer;
                text-align: center;
                box-shadow: 0 5px 5px -5px #333;
                transition: background 0.3s ease-in;

                &:hover {
                    background: #365690;
                }
            }

            .modal-content,
            .modal-backdrop {
                height: 0;
                width: 0;
                opacity: 0;
                visibility: hidden;
                overflow: hidden;
                cursor: pointer;
                transition: opacity 0.2s ease-in;
            }

            .modal-close {
                color: #aaa;
                position: absolute;
                right: 5px;
                top: 5px;
                padding-top: 3px;
                background: #fff;
                font-size: 16px;
                width: 25px;
                height: 25px;
                font-weight: bold;
                text-align: center;
                cursor: pointer;

                &:hover {
                    color: #333;
                }
            }

            .modal-content-btn {
                position: absolute;
                text-align: center;
                cursor: pointer;
                bottom: 20px;
                right: 30px;
                background: #446CB3;
                color: #fff;
                width: 50px;
                border-radius: 2px;
                font-size: 14px;
                height: 32px;
                padding-top: 9px;
                font-weight: normal;

                &:hover {
                    color: #fff;
                    background: #365690;
                }
            }

            #modal-toggle {
                display: none;

                &.active~.modal-backdrop,
                &:checked~.modal-backdrop {
                    background-color: rgba(0, 0, 0, 0.6);
                    width: 100vw;
                    height: 100vh;
                    position: fixed;
                    left: 0;
                    top: 0;
                    z-index: 9;
                    visibility: visible;
                    opacity: 1;
                    transition: opacity 0.2s ease-in;
                }

                &.active~.modal-content,
                &:checked~.modal-content {
                    opacity: 1;
                    background-color: #fff;
                    max-width: 400px;
                    width: 400px;
                    height: 280px;
                    padding: 10px 30px;
                    position: fixed;
                    left: calc(50% - 200px);
                    top: 12%;
                    border-radius: 4px;
                    z-index: 999;
                    pointer-events: auto;
                    cursor: auto;
                    visibility: visible;
                    box-shadow: 0 3px 7px rgba(0, 0, 0, 0.6);

                    @media (max-width: 400px) {
                        left: 0;
                    }
                }
            }
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="bg-gray-100 p-40">
        <div class="container mx-auto mb-2">
            <h1 class="text-5xl font-bold mb-8 text-center">Shop Page</h1>
            <div class="flex items-center justify-center space-x-8 py-4">
                <select id="cropSelectbox"
                    class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    name="crop">
                    @foreach ($data['allcrops'] as $crop)
                        <option value={{ $crop->product }}>{{ $crop->product }}</option>
                    @endforeach
                </select>
                <select id="locationSelectbox"
                    class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    name="location">
                    <option value="">Select Crop To search</option>
                </select>
                <select id="quantitySelectbox"
                    class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    name="quantity">
                    <option value="">Select location of crop</option>
                </select>
                <button id="cropSelectbutton" type="button"
                    class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Search</button>
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-28 products" id="products">
            @foreach ($data['allproducts'] as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src={{ $product->productpicPath }} alt="Product Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">{{ $product->product }}</h2>
                        <p class="text-gray-600 mb-2">Description :- {{ $product->description }}</p>
                        <p class="text-gray-800 font-bold">Price :- {{ $product->price }}</p>
                        <p class="text-gray-800 font-bold">Quantity :- {{ $product->quantity }}</p>
                        <p class="text-gray-800 font-bold">Location :- {{ $product->location }}</p>
                        <button
                            class="modalclose-btn my-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800"
                            data-farmer-id="{{ $product->farmerid }}" data-product-id="{{ $product->id }}"
                            onclick="openModalAndFetchData(this)">View Farmer Details</button>

                    </div>
                </div>
            @endforeach
        </div>
        <div id="modal" class="fixed z-10 inset-0 overflow-y-auto hidden">
            <!-- Modal Content -->
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div id="modalContent" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <!-- Modal content goes here -->
                    </div>
                    <!-- Modal Footer -->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button id="closeModalButton"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script>
        function openModalAndFetchData(e) {
            openModal('modal');
            farmerid = $(e).attr('data-farmer-id');
            productid = $(e).attr('data-product-id');

            console.log($(e).attr('data-farmer-id'));
            $.ajax({
                        url: '{{ route('fetchfamerproducts') }}',
                        type: 'GET',
                        data: {
                            'farmerid': farmerid,
                            'productID': productid,
                        },
                        success: function(data) {
                            const modalContent = document.getElementById('modalContent');
                            @guest

                            modalContent.innerHTML = `
                                <h2 class="text-lg font-semibold mb-2">Supplier Name :- ************</h2>
                                <p class="text-gray-600 mb-2">loaction: ************</p>
                                <p class="text-gray-600 mb-2">Email: ************</p>
                                <p class="text-gray-600 mb-2">Farm Address: ************</p>
                                <p class="text-gray-800 font-bold">Contact: ************</p>
                                <p class="text-gray-800 font-bold">Please Login for bid and Famers Details</p>

                                <!-- Add more fields as needed -->
                            `;
                        @endguest
                        @auth
                        modalContent.innerHTML = `
                            <h2 class="text-lg font-semibold mb-2">Supplier Name :- ${data.SupplierName}</h2>
                            <p class="text-gray-600 mb-2">loaction: ${data.location}</p>
                            <p class="text-gray-600 mb-2">Email: ${data.email}</p>
                            <p class="text-gray-600 mb-2">Farm Address: ${data.address}</p>
                            <p class="text-gray-800 font-bold">Contact: ${data.phone}</p>
                            <a id="closeModalButton" onclick="bid(` + productid + `)" data=` + productid + `
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2  sm:ml-3 sm:w-auto sm:text-sm">Bid for this product</button>
                        `;
                    @endauth
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching farmer details:', error);
                }
        });
        }

        function bid(productID) {
            window.location = '/bid?product=' + productID;
        }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
        }
        document.getElementById('closeModalButton').addEventListener('click', function() {
            closeModal('modal');
        });

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
        }
        $(document).ready(function() {

            $("#cropSelectbutton").click(function() {
                if ($("#cropSelectbox option:selected").val() !== "" && $(
                        "#locationSelectbox option:selected").val() !== "" && $(
                        "#quantitySelectbox option:selected").val() !== "") {
                    var croptype = ($('#cropSelectbox').find(":selected").val());
                    var location = ($('#locationSelectbox').find(":selected").val());
                    var quantity = ($('#quantitySelectbox').find(":selected").val());
                    $.ajax({
                        url: '{{ route('shop') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            'crop': croptype,
                            'quantity': quantity,
                            'location': location,
                        },
                        success: function(data) {
                            createProductCard(data);
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.dataText);
                        }
                    });
                } else {
                    Swal.fire("Please choose all the DropDowns");
                }

            });

            $('#cropSelectbox').change(function() {
                var croptype = ($('#cropSelectbox').find(":selected").val());
                $.ajax({
                    url: "{{ route('get_location_ajax') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'cropType': croptype,
                    },
                    type: "POST",
                    cache: false,
                    success: function(data) {
                        var location = [...new Set(data.map(item => item.location))];
                        var loacationYearDropdown = $('#locationSelectbox');
                        loacationYearDropdown.empty();
                        $('#locationSelectbox').append(
                            '<option value="">Select Location To search</option>');
                        location.forEach(year => {
                            loacationYearDropdown.append($('<option></option>').attr(
                                'value', year).text(year));
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            $('#locationSelectbox').change(function() {
                var croptype = ($('#cropSelectbox').find(":selected").val());
                var location = ($('#locationSelectbox').find(":selected").val());
                $.ajax({
                    url: "{{ route('get_quantity_ajax') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'cropType': croptype,
                        'Location': location,
                    },
                    type: "POST",
                    cache: false,
                    success: function(data) {
                        var quantity = [...new Set(data.map(item => item.quantity + " kg"))];
                        var quantityDropdown = $('#quantitySelectbox');
                        quantityDropdown.empty();
                        $('#quantitySelectbox').append(
                            '<option value="">Select Quantity To search</option>');
                        quantity.forEach(year => {
                            quantityDropdown.append($('<option></option>').attr('value',
                                year).text(year));
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            function createProductCard(allProducts) {
                let productListHtml = "";
                $('#products').empty(); // Clear previous content

                allProducts.forEach(function(product) {
                    productListHtml += `
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <img src="${product.productpicPath}" alt="Product Image" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h2 class="text-lg font-semibold mb-2">${product.product}</h2>
                            <p class="text-gray-600 mb-2">Description :- ${product.description}</p>
                            <p class="text-gray-800 font-bold">Price :- ${product.price}</p>
                            <p class="text-gray-800 font-bold">Quantity :- ${product.quantity}</p>
                            <p class="text-gray-800 font-bold">Location :- ${product.location}</p>
                            <button class="modalclose-btn my-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800" data-farmer-id="${product.farmerid}" data-product-id="${product.id}" onclick="openModalAndFetchData(this)">View Farmer Details</button>
                        </div>
                    </div>`;
                });

                $('#products').html(productListHtml);
            }

            // Get modal and buttons
        });
    </script>


@stop
