<!DOCTYPE html>
@extends('layouts.marketplace')
@section('content')
<style>
    .selectBoxshop{
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

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
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
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
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

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
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
                <select id="cropSelectbox" class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="crop">

                </select>
                <select id="locationSelectbox" class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="location">
                    <option value="">Select Crop To search</option>
                </select>
                <select id="quantitySelectbox" class=" selectBoxshop js-example-basic-multiple w-60 bg-white border border-gray-300 rounded-md focus:outline-none focus:border-blue-500" name="quantity">
                    <option value="">Select location of crop</option>
                </select>
                <button id="cropSelectbutton" type="button" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Search</button>
            </div>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 py-28 products" id="products">
    </div>
    {{-- <button  style="width:100%;max-width:300px">sdsd</button> --}}

    <!-- The Modal -->
    <div id="myModal" class="modal">
      <span class="close">&times;</span>
      <img class="modal-content" id="img01">
      <div id="caption"></div>
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
                $.each(data.allCrops, function(key, value) {
                    options += '<option value="' + value.product + '">' + value.product + '</option>';
                });
                $('#cropSelectbox').html(options);
                createProductCard(data.products);
            },
            error: function(xhr, status, error) {
                console.error(xhr.dataText);
            }
        });
        
        $("#cropSelectbutton").click(function() {
            var croptype = ($('#cropSelectbox').find(":selected").val());
            var location = ($('#locationSelectbox').find(":selected").val());
            var quantity = ($('#quantitySelectbox').find(":selected").val());
            $.ajax({
                url: '{{ route("shop") }}',
                type: 'GET',
                dataType: 'json',
                data: {
                    'crop' : croptype,
                    'quantity' : quantity,
                    'location': location ,
                },
                success: function(data) {
                    createProductCard(data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.dataText);
                }
            });
        
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
                    location.forEach(year => {
                        loacationYearDropdown.append($('<option></option>').attr('value', year).text(year));
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
                    var quantity = [...new Set(data.map(item => item.quantity+" kg"))];
                    var quantityDropdown = $('#quantitySelectbox');
                    quantityDropdown.empty(); 
                    quantity.forEach(year => {
                        quantityDropdown.append($('<option></option>').attr('value', year).text(year));
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        function createProductCard(allProducts){
            productListHtml ="";
            $('#products').html("");
            console.log(allProducts);
            allProducts.forEach(function(product) {
                productListHtml += '<div class="bg-white rounded-lg shadow-md overflow-hidden">';
                productListHtml += '<img src='+product.productpicPath+' alt="Product Image" class="w-full h-48 object-cover">';
                productListHtml += '<div class="p-4">';
                productListHtml += '<h2 class="text-lg font-semibold mb-2">' + product.product + '</h2>';
                productListHtml += '<p class="text-gray-600 mb-2">Description :- ' + product.description + '</p>';
                productListHtml += '<p class="text-gray-800 font-bold">Price :- ' + product.price + '</p>';
                productListHtml += '<p class="text-gray-800 font-bold">Quantity :- ' + product.quantity + '</p>';
                productListHtml += '<p class="text-gray-800 font-bold">Location :- ' + product.location + '</p>';
                productListHtml += '<button id="myImg" class=" close-btn my-4 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800" data-farmer-id="' + product.farmerid + '">View Farmer Details</button>';
                productListHtml += '</div></div>';
            });
            $('#products').html(productListHtml);
        }

        
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
        modal.style.display = "none";
        }
    });


</script>


@stop