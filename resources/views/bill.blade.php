<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>

    <p>Size: {{ ucfirst($orderDetails['size']) }}</p>
    <p>Toppings: {{ $orderDetails['toppings'] == 'pepperoni' ? 'Pepperoni' : 'None' }}</p>
    <p>Extra Cheese: {{ $orderDetails['extra_cheese'] == 'yes' ? 'Yes' : 'No' }}</p>
    <p>Total Bill: RM {{ $orderDetails['total_bill'] }}</p>

    <button class="back-button" onclick="history.back()">Go Back</button>
</body>
</html>
