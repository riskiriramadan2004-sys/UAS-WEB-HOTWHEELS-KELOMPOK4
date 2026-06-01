<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        Cart::where('user_id', session('user.id'))
            ->whereDoesntHave('product')
            ->delete();

        $carts = Cart::with('product')
            ->where('user_id', session('user.id'))
            ->get();

        return view('cart.index', compact('carts'));
    }

    public function store($product_id)
    {
        $product = Product::findOrFail($product_id);

        if ($product->stock <= 0) {
            return back()->with('error', 'Product out of stock');
        }

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
                'quantity' => 1,
            ]);
        }

        return back()->with('success', 'Product added to cart');
    }

    public function checkout()
    {
        Cart::where('user_id', session('user.id'))
            ->whereDoesntHave('product')
            ->delete();

        $carts = Cart::with('product')
            ->where('user_id', session('user.id'))
            ->get();

        return view('cart.checkout', compact('carts'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'payment_method' => 'required',
        ]);

        $carts = Cart::with('product')
            ->where('user_id', session('user.id'))
            ->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')
                ->with('error', 'Cart is empty');
        }

        foreach ($carts as $cart) {
            if (!$cart->product) {
                continue;
            }

            Order::create([
                'user_id' => session('user.id'),
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'payment_method' => $request->payment_method,
                'status' => 'pending',
            ]);

            $cart->product->stock = max(0, $cart->product->stock - $cart->quantity);
            $cart->product->save();
        }

        Cart::where('user_id', session('user.id'))->delete();

        return redirect()->route('orders.history')
            ->with('success', 'Order placed successfully');
    }

    public function orderHistory()
    {
        $orders = Order::with('product')
            ->where('user_id', session('user.id'))
            ->orderBy('id', 'desc')
            ->get();

        return view('cart.orders', compact('orders'));
    }
}