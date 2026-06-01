@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <h2 class="mb-4">Orders Management</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Payment</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->username ?? '-' }}</td>
                <td>{{ $order->product->name ?? '-' }}</td>
                <td>{{ $order->quantity }}</td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">
                    No Orders Found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection