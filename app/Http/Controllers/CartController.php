<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('product')
            ->where('user_id', session('user.id'))
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function store($product_id)
{
    $cart = Cart::where('user_id', session('user.id'))
        ->where('product_id', $product_id)
        ->first();

    if ($cart) {

        $cart->quantity += 1;
        $cart->save();

    } else {

        Cart::create([
            'user_id' => session('user.id'),
            'product_id' => $product_id,
            'quantity' => 1
        ]);
    }

    return back()->with(
        'success',
        'Product added to cart'
    );
}

public function checkout()
{
    $carts = Cart::with('product')
        ->where('user_id', session('user.id'))
        ->get();

    return view(
        'cart.checkout',
        compact('carts')
    );
}

public function processCheckout(Request $request)
{
    $request->validate([
        'payment_method' => 'required'
    ]);

    $carts = Cart::where(
        'user_id',
        session('user.id')
    )->get();

    foreach ($carts as $cart) {

        Order::create([
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'quantity' => $cart->quantity,
            'payment_method' => $request->payment_method,
            'status' => 'paid'
        ]);
    }

    Cart::where(
        'user_id',
        session('user.id')
    )->delete();

    return redirect('/cart')
        ->with(
            'success',
            'Payment successful'
        );
}
}