@extends('layouts.user')

@section('content')

<div class="container my-5">

    <div class="text-center mb-5">
        <h1 class="display-4 fw-bold text-white">
            🔥 Hot Wheels <span class="price-tag">Collection</span>
        </h1>
        <p class="text-white-50">Authentic diecast cars from Mattel</p>

        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <input type="text"
                       id="searchInput"
                       class="search-bar"
                       placeholder="🔍 Search your favorite car...">
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="row g-4" id="productList">
        @foreach($products as $product)
            <div class="col-md-3 product-item" data-name="{{ strtolower($product->name) }}">
                <div class="product-card h-100">

                    <img src="{{ asset('uploads/'.$product->image) }}"
                         class="product-image"
                         alt="{{ $product->name }}">

                    <div class="p-3">
                        <h5 class="text-white fw-bold">{{ $product->name }}</h5>

                        <p class="price-tag h4">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>

                        <p class="text-white-50 small">
                            📦 stock: {{ $product->stock }} pcs
                        </p>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-buy w-100 text-white">
                                🛒 buy now
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let value = this.value.toLowerCase();

        document.querySelectorAll('.product-item').forEach(function (item) {
            let name = item.getAttribute('data-name');
            item.style.display = name.includes(value) ? 'block' : 'none';
        });
    });
</script>

@endsection