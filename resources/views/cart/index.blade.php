@extends('layouts.user')

@section('content')

<h2 class="mb-4">My Cart</h2>

<div class="card-custom p-4">

<table class="table table-dark">

    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>

    @php
        $total = 0;
    @endphp

    @foreach($carts as $cart)

    @php
        $subtotal =
        $cart->product->price *
        $cart->quantity;

        $total += $subtotal;
    @endphp

    <tr>
        <td>{{ $cart->product->name }}</td>

        <td>
            Rp {{ number_format($cart->product->price) }}
        </td>

        <td>
            {{ $cart->quantity }}
        </td>

        <td>
            Rp {{ number_format($subtotal) }}
        </td>
    </tr>

    @endforeach

    </tbody>

</table>

<hr>

<h4>
    Total :
    Rp {{ number_format($total) }}
</h4>

<a href="{{ route('checkout') }}"
   class="btn btn-danger mt-3">
    Checkout
</a>

</div>

<hr>

<a
    href="{{ route('checkout') }}"
    class="btn btn-danger">

    Checkout
</a>
@endsection