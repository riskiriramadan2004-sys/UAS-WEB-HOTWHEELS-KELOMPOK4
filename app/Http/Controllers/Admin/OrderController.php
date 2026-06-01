<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Order $order)
    {
        $order->update([
            'status' => 'completed',
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order accepted successfully');
    }
}