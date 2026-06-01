@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="welcome-text">Orders Management</div>
        <div class="welcome-subtext">
            Accept customer orders and update order status
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="table-card">

    <table class="table align-middle mb-0">

        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Payment</th>
                <th>Status</th>
                <th width="200">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>

                    <td>{{ $order->user->username ?? '-' }}</td>

                    <td>{{ $order->product->name ?? '-' }}</td>

                    <td>{{ $order->quantity }}</td>

                    <td>{{ $order->payment_method }}</td>

                    <td>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>
                        @elseif($order->status == 'completed')
                            <span class="badge bg-success">
                                Accepted
                            </span>
                        @else
                            <span class="badge bg-secondary">
                                {{ ucfirst($order->status) }}
                            </span>
                        @endif
                    </td>

                    <td>
                        @if($order->status == 'pending')
                            <form method="POST"
                                  action="{{ route('admin.orders.update-status', $order->id) }}">
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success btn-sm">
                                    ✔ Accept Order
                                </button>
                            </form>
                        @else
                            <span class="text-success fw-bold">
                                Accepted
                            </span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">
                        No Orders Found
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>

</div>

@endsection