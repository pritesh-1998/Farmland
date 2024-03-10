<!DOCTYPE html>
@extends('layouts.marketplace')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="bg-gray-100 p-40">
    <div class="container mx-auto mb-2">
        <h1 class="text-5xl font-bold mb-8 text-center">Shop Page</h1>
        <form action="">
        <div class="flex items-center justify-center space-x-8 py-4">
                <select id="cropSelectbox" class="js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="crops">

                </select>
                <select id="quantitySelectbox" class="js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="quantity">

                </select>
                <select id="locationSelectbox" class="js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="location">

                </select>
                <button id="cropSelectbox" type="submit" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Search</button>
            </div>
        </form>
    </div>
    
        
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8 py-28">
            <!-- Product Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 1</h2>
                    <p class="text-gray-600 mb-2">Product Description 1</p>
                    <p class="text-gray-800 font-bold">$19.99</p>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 2</h2>
                    <p class="text-gray-600 mb-2">Product Description 2</p>
                    <p class="text-gray-800 font-bold">$29.99</p>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 3</h2>
                    <p class="text-gray-600 mb-2">Product Description 3</p>
                    <p class="text-gray-800 font-bold">$39.99</p>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 4</h2>
                    <p class="text-gray-600 mb-2">Product Description 4</p>
                    <p class="text-gray-800 font-bold">$49.99</p>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 5</h2>
                    <p class="text-gray-600 mb-2">Product Description 5</p>
                    <p class="text-gray-800 font-bold">$59.99</p>
                </div>
            </div>
            <!-- Product Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 1</h2>
                    <p class="text-gray-600 mb-2">Product Description 1</p>
                    <p class="text-gray-800 font-bold">$19.99</p>
                </div>
            </div>

            <!-- Product Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 2</h2>
                    <p class="text-gray-600 mb-2">Product Description 2</p>
                    <p class="text-gray-800 font-bold">$29.99</p>
                </div>
            </div>

            <!-- Product Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 3</h2>
                    <p class="text-gray-600 mb-2">Product Description 3</p>
                    <p class="text-gray-800 font-bold">$39.99</p>
                </div>
            </div>

            <!-- Product Card 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 4</h2>
                    <p class="text-gray-600 mb-2">Product Description 4</p>
                    <p class="text-gray-800 font-bold">$49.99</p>
                </div>
            </div>

            <!-- Product Card 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300" alt="Product Image" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold mb-2">Product Name 5</h2>
                    <p class="text-gray-600 mb-2">Product Description 5</p>
                    <p class="text-gray-800 font-bold">$59.99</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '{{ route("get_crops_ajax") }}',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var options = '<option value="">Select Crops</option>';
                $.each(data.results, function(key, value) {
                    options += '<option value="' + value.product + '">' + value.product + '</option>';
                });
                $('#cropSelectbox').html(options);
            },
            error: function(xhr, status, error) {
                console.error(xhr.dataText);
            }
        });
        $('#cropSelectbox').change(function() {
            var croptype = ($('#cropSelectbox').find(":selected").val());
            ajaxcallfordrodowns(croptype);
        });
    });



function ajaxcallfordrodowns(croptype){
    $.ajax({
            url: "{{ route('get_quantity_location_ajax') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                'cropType': croptype,
            },
            type: "POST",
            cache: false,
            success: function(data) {
                console.log(data);
                var quantitys = [...new Set(data.map(item => item.quantity+" kg"))];
                var quantityTypeDropdown = $('#quantitySelectbox');
                quantityTypeDropdown.empty(); 
                quantitys.forEach(type => {
                    quantityTypeDropdown.append($('<option></option>').attr('value', type).text(type));
                });

                var location = [...new Set(data.map(item => item.location))];
                var loacationYearDropdown = $('#locationSelectbox');
                loacationYearDropdown.empty(); 
                location.forEach(year => {
                    loacationYearDropdown.append($('<option></option>').attr('value', year).text(year));
                });
            },
            error: function(data) {
                console.log(data);
            }
        });
}



</script>


@stop