<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class UserDashboardController extends Controller
{
    public function index()
    {
        $total_products = Product::count();

        $total_orders = Order::where(
            'user_id',
            session('user.id')
        )->count();

        return view('user.dashboard', compact(
            'total_products',
            'total_orders'
        ));
    }
}
