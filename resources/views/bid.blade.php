<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Bidding</title>
    <link rel="stylesheet" href="{{ asset('css/bid.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <header>
            <h1>Product Bidding</h1>
        </header>
        <div class="product-details">
            <img src="{{ $data->productpicPath }}" alt="Product Image">
            <div class="info">
                @php
                    // dd($data);
                @endphp
                <h2>Product Name :- {{ $data->product }}</h2>
                <p>Description :- {{ $data->description }}</p>
                <p>LOcation :- {{ $data->location }}</p>
                <p>Quantity :- {{ $data->quantity }}</p>
                <p>Current Highest Bid: {{ $data->price }}</p>
            </div>
        </div>
        <div class="bid-form">
            <h2>Place Your Bid</h2>
            <form id="bidForm">
                <label for="bidAmount">Your Bid Amount ($)</label>
                <input type="number" id="bidAmount" name="bidAmount" min="0" required>
                <button type="submit" id="submitBid">Place Bid</button>
            </form>
            <p id="message"></p>
        </div>
    </div>

    <script>
        document.getElementById('bidForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const bidAmount = parseFloat(document.getElementById('bidAmount').value);
            const currentHighestBid = {{ $data->price }};

            if (bidAmount > currentHighestBid) {
                // Simulate successful bid submission (you can implement actual backend logic here)
                $.ajax({
                    url: '{{ route('submitBid') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'product': "{{ $data->id }}",
                        'quantity': "{{ $data->quantity }}",
                        'location': "{{ $data->location }}",
                        'price': bidAmount,
                        'quantity': "{{ $data->quantity }}",
                        'name': "{{ $data->product }}",

                    },
                    success: function(data) {
                        document.getElementById('message').textContent =
                            `Congratulations! Your bid of $${bidAmount} is currently the highest.`;
                        document.getElementById('message').style.display = 'block';
                        // Update current highest bid display (you can implement this dynamically)
                        document.querySelector('.product-details p:last-child').textContent =
                            `Current Highest Bid: $${bidAmount}`;
                    },
                    error: function(xhr, status, error) {
                        document.getElementById('message').textContent =
                            `Something went wrong $${currentHighestBid}.`;
                        document.getElementById('message').style.display = 'block';
                    }
                });
            } else {
                document.getElementById('message').textContent =
                    `Your bid must be higher than the current highest bid of $${currentHighestBid}.`;
                document.getElementById('message').style.display = 'block';
            }
        });
    </script>
</body>

</html>
