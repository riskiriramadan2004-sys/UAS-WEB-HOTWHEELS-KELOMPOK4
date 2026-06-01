@extends('layouts.user')

@section('content')

<h1 class="mb-4">Products</h1>

<div class="row">

@foreach($products as $product)

<div class="col-md-4 mb-4">

    <div class="card card-custom h-100">
        <img src="{{ asset('uploads/'.$product->image) }}"
             height="250"
             style="object-fit:cover">

        <div class="card-body">

            <h5>{{ $product->name }}</h5>

            <p>
                Rp {{ number_format($product->price) }}
            </p>

            <form action="{{ route('cart.add',$product->id) }}"
      method="POST">

    @csrf

    <button class="btn btn-danger w-100">
        Add To Cart
    </button>

</form>

        </div>

    </div>

</div>

@endforeach

</div>

@endsection