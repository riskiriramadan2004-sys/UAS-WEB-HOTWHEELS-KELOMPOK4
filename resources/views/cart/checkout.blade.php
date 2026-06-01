@extends('layouts.user')

@section('content')

<h2 class="mb-4">
    Checkout
</h2>

<div class="card-custom p-4">

<form
    action="{{ route('checkout.process') }}"
    method="POST">

    @csrf

    <div class="mb-3">

        <label>
            Payment Method
        </label>

        <select
            name="payment_method"
            class="form-control">

            <option value="Bank Transfer">
                Bank Transfer
            </option>

            <option value="DANA">
                DANA
            </option>

            <option value="OVO">
                OVO
            </option>

            <option value="GoPay">
                GoPay
            </option>

        </select>

    </div>

    <button
        class="btn btn-danger">
        Pay Now
    </button>

</form>

</div>

@endsection