@extends('layouts.user')

@section('content')

<div class="container">

    <div class="text-center mb-5">
        <h1 class="hot-title">
            🔥 Hot Wheels <span>Collection</span>
        </h1>

        <p class="hot-subtitle">
            Authentic diecast cars from Mattel
        </p>

        <form method="GET" action="{{ route('dashboard') }}" class="search-wrapper mt-4">
            <input
                type="text"
                name="search"
                value="{{ $search ?? '' }}"
                placeholder="🔍 Search your favorite car..."
                class="search-input"
            >
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product-card">

                    <div class="product-image-box">
                        @if($product->image)
                            <img
                                src="{{ asset('uploads/'.$product->image) }}"
                                alt="{{ $product->name }}"
                                class="product-image"
                            >
                        @else
                            <div class="no-image">
                                HOTWHEELS
                            </div>
                        @endif
                    </div>

                    <div class="product-body">
                        <h4>{{ $product->name }}</h4>

                        <h3>
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </h3>

                        <p>
                            📦 stock: {{ $product->stock }} pcs
                        </p>

                        @if($product->stock > 0)
                            <form method="POST" action="{{ route('cart.add', $product->id) }}">
                                @csrf

                                <button class="btn-buy">
                                    🛒 buy now
                                </button>
                            </form>
                        @else
                            <button class="btn-buy disabled" disabled>
                                out of stock
                            </button>
                        @endif
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12 text-center text-white-50">
                Produk tidak ditemukan.
            </div>
        @endforelse
    </div>

</div>

<style>
    .search-wrapper {
        max-width: 650px;
        margin: auto;
    }

    .search-input {
        width: 100%;
        background: #1b1b1b;
        border: 1px solid rgba(255,255,255,.18);
        color: white;
        border-radius: 40px;
        padding: 18px 28px;
        font-size: 20px;
        outline: none;
    }

    .search-input:focus {
        border-color: #ff6b6b;
        box-shadow: 0 0 30px rgba(255,90,0,.25);
    }

    .product-card {
        height: 100%;
        background: linear-gradient(145deg, #111, #171717);
        border: 1px solid rgba(255,255,255,.12);
        border-radius: 28px;
        overflow: hidden;
        transition: .3s;
    }

    .product-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255,90,0,.55);
        box-shadow: 0 25px 60px rgba(255,90,0,.16);
    }

    .product-image-box {
        height: 260px;
        background:
            radial-gradient(circle at center, rgba(255,90,0,.12), transparent 55%),
            #101010;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 18px;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: contain;
        filter: drop-shadow(0 18px 25px rgba(0,0,0,.65));
        transition: .3s;
    }

    .product-card:hover .product-image {
        transform: scale(1.08);
    }

    .no-image {
        color: rgba(255,255,255,.18);
        font-weight: 800;
        letter-spacing: 2px;
    }

    .product-body {
        padding: 25px;
        background: linear-gradient(to bottom, #171717, #101010);
    }

    .product-body h4 {
        color: white;
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .product-body h3 {
        color: #ff6b5f;
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 10px;
    }

    .product-body p {
        color: rgba(255,255,255,.55);
        font-size: 16px;
        margin-bottom: 22px;
    }

    .btn-buy {
        width: 100%;
        border: none;
        border-radius: 40px;
        padding: 14px;
        color: white;
        font-weight: 800;
        font-size: 18px;
        background: linear-gradient(135deg, #ff6b6b, #ff5a00);
        transition: .25s;
    }

    .btn-buy:hover {
        transform: scale(1.03);
        box-shadow: 0 16px 35px rgba(255,90,0,.35);
    }

    .btn-buy.disabled {
        background: #555;
    }
</style>

@endsection