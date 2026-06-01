@extends('layouts.user')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="hot-title">Your <span>Cart</span></h1>
            <p class="hot-subtitle">Review your selected Hot Wheels collection</p>
        </div>

        <a href="{{ route('dashboard') }}" class="btn-hot-outline">
            ← Back to Products
        </a>
    </div>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($carts->isEmpty())
        <div class="hot-card p-5 text-center">
            <h3>Your cart is empty</h3>
            <p class="text-white-50">Start adding your favorite Hot Wheels cars.</p>
            <a href="{{ route('dashboard') }}" class="btn-hot mt-3">Shop Now</a>
        </div>
    @else
        <div class="hot-card p-4">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $grandTotal = 0; @endphp

                        @foreach($carts as $cart)
                            @if($cart->product)
                                @php
                                    $total = $cart->product->price * $cart->quantity;
                                    $grandTotal += $total;
                                @endphp

                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-3">
                                            @if($cart->product->image)
                                                <img src="{{ asset('uploads/'.$cart->product->image) }}"
                                                     style="width:75px;height:75px;object-fit:contain;border-radius:16px;background:#111;padding:8px;">
                                            @endif

                                            <strong>{{ $cart->product->name }}</strong>
                                        </div>
                                    </td>

                                    <td>Rp {{ number_format($cart->product->price, 0, ',', '.') }}</td>
                                    <td>{{ $cart->quantity }}</td>
                                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="3">Grand Total</th>
                            <th style="color:#ff6b6b;">
                                Rp {{ number_format($grandTotal, 0, ',', '.') }}
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="text-end mt-4">
                <a href="{{ route('checkout') }}" class="btn-hot">
                    Checkout →
                </a>
            </div>
        </div>
    @endif
</div>

@endsection