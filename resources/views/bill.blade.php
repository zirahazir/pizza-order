<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

    <form method="POST" action="{{ route('process.payment') }}">
        @csrf
        <p>Size: {{ ucfirst($orderDetails['size']) }}</p>
        <p>Toppings: {{ $orderDetails['toppings'] == 'pepperoni' ? 'Pepperoni' : 'None' }}</p>
        <p>Extra Cheese: {{ $orderDetails['extra_cheese'] == 'yes' ? 'Yes' : 'No' }}</p>
        <p>Total Bill: RM {{ $orderDetails['total_bill'] }}</p>

        <p>
            <label for="name">Name:</label>
            <input type="text" name='name' placeholder="Payer Name Here" required>
        </p>

        <p>
            <label for="email">Email:</label>
            <input type="text" name='email' placeholder="PayerEmailHere@gmail.com" required>
        </p>

        <input type="hidden" name="mobile" value="60121234567">
        <input type="hidden" name="amount" value ="{{ $orderDetails['total_bill'] }}">
        <input type="hidden" name="reference_1_label" value="">
        <input type="hidden" name="reference_1" value="7">
        <input type="hidden" name="reference_2_label" value="">
        <input type="hidden" name="reference_2" value="7">
        <input type="hidden" name="description" value ="">
        <input type="hidden" name="collection_id" value = "">
       
        <p><button type="submit">Make Payment</button></p>
    </form>

    <button class="back-button" onclick="history.back()">Go Back</button>

    
</body>
</html>
