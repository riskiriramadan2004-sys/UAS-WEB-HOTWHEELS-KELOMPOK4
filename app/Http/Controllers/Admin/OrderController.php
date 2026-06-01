<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'product'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.orders.index')
            ->with('success', 'Order status updated successfully');
    }
}