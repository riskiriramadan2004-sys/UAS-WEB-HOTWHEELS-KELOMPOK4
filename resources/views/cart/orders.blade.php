@extends('layouts.user')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="hot-title">My <span>Orders</span></h1>
            <p class="hot-subtitle">Track your Hot Wheels purchase history</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-hot-outline">
            ← Back to Products
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="hot-card p-4">
        <div class="table-responsive">
            <table class="table table-dark table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Payment</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>{{ $order->product->name ?? '-' }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>
                                Rp {{ number_format(($order->product->price ?? 0) * $order->quantity, 0, ',', '.') }}
                            </td>
                            <td>{{ $order->payment_method }}</td>
                            <td>
                                @if($order->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($order->status == 'paid')
                                    <span class="badge bg-info text-dark">Paid</span>
                                @elseif($order->status == 'shipped')
                                    <span class="badge bg-primary">Shipped</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-white-50">
                                You have no orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection