<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaOrderController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function calculate(Request $request)
    {
        $size         = $request->size;
        $toppings     = $request->toppings;
        $extra_cheese = $request->extra_cheese;

        $prices = [
            'small'  => 15, 
            'medium' => 22,
            'large'  => 30
        ];

        $topping_prices = [
            'pepperoni' => ['small' => 3, 'medium' => 5, 'large' => 7],
            'extra_cheese' => 6
        ];

        $base_price = $prices[$size];

        if ($toppings == 'pepperoni') {
            $base_price += $topping_prices['pepperoni'][$size];
        }

        if ($extra_cheese == 'yes') {
            $base_price += $topping_prices['extra_cheese'];
        }

        $request->session()->put('order_details', [
            'size'         => $size,
            'toppings'     => $toppings,
            'extra_cheese' => $extra_cheese,
            'total_bill'   => $base_price
        ]);

        return redirect()->route('order.details');
    }

    public function orderDetails(Request $request)
    {
        $orderDetails = $request->session()->get('order_details');

        return view('bill', compact('orderDetails'));
    }
}