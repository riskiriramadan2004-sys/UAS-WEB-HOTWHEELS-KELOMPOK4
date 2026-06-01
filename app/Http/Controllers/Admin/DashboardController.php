<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->get();

        $total_products = Product::count();
        $total_orders = Order::count();
        $total_users = User::count();

        $revenue = Order::join('products', 'orders.product_id', '=', 'products.id')
            ->sum(DB::raw('orders.quantity * products.price'));

        $pending_orders = Order::where('status', 'pending')->count();

        $low_stock = Product::where('stock', '<=', 5)->count();

        $recent_orders = Order::with(['user', 'product'])
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'products',
            'search',
            'total_products',
            'total_orders',
            'total_users',
            'revenue',
            'pending_orders',
            'low_stock',
            'recent_orders'
        ));
    }
}