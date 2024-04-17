<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Order</title>
</head>
<body>
    <h1>Pizza Order</h1>

    <form method="POST" action="{{ route('calculate') }}">
        @csrf
        <label for="size">Size:</label>
        <select name="size" id="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="large">Large</option>
        </select><br><br>
        
        <label for="toppings">Toppings:</label>
        <input type="radio" name="toppings" value="pepperoni"> Pepperoni
        <input type="radio" name="toppings" value="none" checked> None<br><br>

        <label for="extra_cheese">Extra Cheese:</label>
        <input type="radio" name="extra_cheese" value="yes"> Yes
        <input type="radio" name="extra_cheese" value="no" checked> No<br><br>

        <button type="submit">Order</button>
    </form>
</body>
</html>
