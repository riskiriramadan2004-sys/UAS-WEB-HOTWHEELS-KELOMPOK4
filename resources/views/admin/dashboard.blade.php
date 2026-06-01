@extends('layouts.admin')

@section('content')

<div class="welcome-text">
    Welcome back, Admin!
</div>

<div class="welcome-subtext">
    Here's what's happening with your store today.
</div>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">{{ $total_products }}</div>
                    <div class="stat-label">Total Products</div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-car"></i>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">{{ $total_orders }}</div>
                    <div class="stat-label">Total Orders</div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">{{ $total_users }}</div>
                    <div class="stat-label">Total Users</div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="row g-4 mb-4">

    <div class="col-md-6">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">
                        Rp {{ number_format($revenue, 0, ',', '.') }}
                    </div>

                    <div class="stat-label">
                        Revenue
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">{{ $pending_orders }}</div>
                    <div class="stat-label">Pending Orders</div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-clock"></i>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">

                <div>
                    <div class="stat-value">{{ $low_stock }}</div>
                    <div class="stat-label">Low Stock</div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="stat-card">

    <h4 class="mb-3">Recent Orders</h4>

    <div class="table-responsive">

        <table class="table table-dark table-hover">

            <thead>
                <tr>
                    <th>User</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>

            @forelse($recent_orders as $order)

                <tr>
                    <td>{{ $order->user->username ?? '-' }}</td>
                    <td>{{ $order->product->name ?? '-' }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center">
                        No orders found
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection