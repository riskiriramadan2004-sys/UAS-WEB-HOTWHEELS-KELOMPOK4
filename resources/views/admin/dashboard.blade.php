@extends('layouts.admin')

@section('content')

<div class="admin-dashboard">

    <div class="mb-4">
        <div class="welcome-text">Welcome back, Admin!</div>
        <div class="welcome-subtext">
            Here's what's happening with your Hot Wheels store today.
        </div>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-xl-4 col-md-6">
            <div class="dash-card">
                <div>
                    <h2>{{ $total_products }}</h2>
                    <p>Total Products</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-car-side"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="dash-card">
                <div>
                    <h2>{{ $total_orders }}</h2>
                    <p>Total Orders</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-cart-shopping"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6">
            <div class="dash-card">
                <div>
                    <h2>{{ $total_users }}</h2>
                    <p>Total Users</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-users"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-md-6">
            <div class="dash-card revenue-card">
                <div>
                    <h2>Rp {{ number_format($revenue, 0, ',', '.') }}</h2>
                    <p>Revenue</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="dash-card">
                <div>
                    <h2>{{ $pending_orders }}</h2>
                    <p>Pending Orders</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="dash-card">
                <div>
                    <h2>{{ $low_stock }}</h2>
                    <p>Low Stock</p>
                </div>
                <div class="dash-icon">
                    <i class="fas fa-triangle-exclamation"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="orders-panel">
        <div class="panel-header">
            <div>
                <h3>Recent Orders</h3>
                <p>Latest customer purchases</p>
            </div>

            <a href="{{ route('admin.orders.index') }}" class="btn-hot">
                View All Orders
            </a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table align-middle mb-0">
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
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge bg-success">Accepted</span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">
                                No recent orders.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<style>
    .admin-dashboard {
        max-width: 1500px;
        margin: 0 auto;
    }

    .dash-card {
        min-height: 145px;
        padding: 28px;
        border-radius: 26px;
        background: linear-gradient(135deg, rgba(255,255,255,.08), rgba(255,255,255,.025));
        border: 1px solid rgba(255,255,255,.12);
        box-shadow: 0 20px 45px rgba(0,0,0,.35);
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: .3s;
    }

    .dash-card:hover {
        transform: translateY(-6px);
        border-color: rgba(255,77,0,.55);
        box-shadow: 0 25px 60px rgba(255,77,0,.18);
    }

    .revenue-card {
        background: linear-gradient(135deg, rgba(255,77,0,.16), rgba(255,255,255,.03));
    }

    .dash-card h2 {
        color: white;
        font-size: 34px;
        font-weight: 800;
        margin: 0;
    }

    .dash-card p {
        color: rgba(255,255,255,.65);
        margin: 10px 0 0;
        font-weight: 600;
    }

    .dash-icon {
        width: 64px;
        height: 64px;
        border-radius: 22px;
        background: rgba(255,77,0,.18);
        color: #ffb347;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
    }

    .orders-panel {
        padding: 28px;
        border-radius: 28px;
        background: linear-gradient(135deg, rgba(255,255,255,.075), rgba(255,255,255,.025));
        border: 1px solid rgba(255,255,255,.12);
        box-shadow: 0 25px 60px rgba(0,0,0,.35);
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .panel-header h3 {
        color: white;
        font-size: 30px;
        font-weight: 800;
        margin: 0;
    }

    .panel-header p {
        color: rgba(255,255,255,.55);
        margin: 6px 0 0;
    }

    .orders-panel th {
        color: #ffb347 !important;
        font-weight: 800;
        padding: 18px 14px;
    }

    .orders-panel td {
        padding: 18px 14px;
        color: white;
    }

    .btn-hot {
        background: linear-gradient(135deg, #ff4d00, #ffb347);
        color: white;
        text-decoration: none;
        padding: 11px 22px;
        border-radius: 14px;
        font-weight: 800;
    }

    .btn-hot:hover {
        color: white;
        box-shadow: 0 12px 30px rgba(255,77,0,.3);
    }
</style>

@endsection