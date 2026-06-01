@extends('layouts.user')

@section('content')

<div class="container my-5">

    <div class="dashboard-hero mb-5">
        <div>
            <div class="eyebrow">WELCOME COLLECTOR</div>

            <h1>
                Halo, {{ session('user.username') }}
            </h1>

            <p>
                Jelajahi koleksi Hot Wheels terbaik, pesan mobil favoritmu,
                dan pantau riwayat pembelianmu di sini.
            </p>

            <a href="{{ route('products.index') }}" class="btn-dashboard">
                Explore Collection →
            </a>
        </div>
    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-4">
            <div class="dash-card">
                <div class="dash-icon">🏎️</div>
                <h3>{{ $total_products ?? 0 }}</h3>
                <p>Available Products</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dash-card">
                <div class="dash-icon">📦</div>
                <h3>{{ $total_orders ?? 0 }}</h3>
                <p>My Orders</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dash-card">
                <div class="dash-icon">🔥</div>
                <h3>Hot</h3>
                <p>Collector Deals</p>
            </div>
        </div>

    </div>

    <div class="feature-section">
        <div class="row align-items-center g-4">

            <div class="col-md-6">
                <img
                    src="{{ asset('uploads/Pages Awal.jpg') }}"
                    class="feature-image"
                    alt="Hot Wheels Collection"
                >
            </div>

            <div class="col-md-6">
                <div class="eyebrow">HOTWHEELS STORE</div>

                <h2>
                    Build your dream cars collection.
                </h2>

                <p>
                    Pilih produk Hot Wheels favoritmu, masukkan ke keranjang,
                    checkout, lalu pantau status pesanan melalui halaman
                    My Orders.
                </p>

                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('products.index') }}" class="btn-dashboard">
                        Shop Now
                    </a>

                    <a href="{{ route('orders.history') }}" class="btn-outline-dashboard">
                        My Orders
                    </a>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
    .dashboard-hero {
        min-height: 380px;
        border-radius: 36px;
        padding: 60px;
        display: flex;
        align-items: center;
        background:
            linear-gradient(to right, rgba(0,0,0,.85), rgba(0,0,0,.35)),
            url('{{ asset('uploads/Pages Awal.jpg') }}');
        background-size: cover;
        background-position: center;
        border: 1px solid rgba(255,107,26,.25);
        box-shadow: 0 25px 70px rgba(0,0,0,.55);
    }

    .eyebrow {
        color: #ff7a1a;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }

    .dashboard-hero h1 {
        font-family: 'Orbitron', sans-serif;
        color: white;
        font-size: 52px;
        font-weight: 800;
        text-transform: uppercase;
        max-width: 680px;
    }

    .dashboard-hero p {
        color: rgba(255,255,255,.75);
        font-size: 18px;
        max-width: 620px;
        margin: 20px 0 35px;
    }

    .btn-dashboard {
        display: inline-block;
        padding: 14px 34px;
        border-radius: 40px;
        color: white;
        text-decoration: none;
        font-weight: 800;
        border: none;
        background: linear-gradient(135deg, #ff5a00, #ffa12b);
        box-shadow: 0 14px 35px rgba(255,90,0,.35);
    }

    .btn-dashboard:hover {
        color: white;
        transform: translateY(-3px);
    }

    .btn-outline-dashboard {
        display: inline-block;
        padding: 14px 34px;
        border-radius: 40px;
        color: white;
        text-decoration: none;
        font-weight: 800;
        border: 1px solid rgba(255,255,255,.2);
        background: rgba(255,255,255,.06);
    }

    .dash-card {
        height: 100%;
        padding: 30px;
        border-radius: 28px;
        background: linear-gradient(135deg, rgba(255,255,255,.08), rgba(255,255,255,.03));
        border: 1px solid rgba(255,107,26,.22);
        box-shadow: 0 20px 50px rgba(0,0,0,.35);
        transition: .3s;
    }

    .dash-card:hover {
        transform: translateY(-8px);
        border-color: rgba(255,107,26,.65);
        box-shadow: 0 25px 60px rgba(255,90,0,.18);
    }

    .dash-icon {
        font-size: 36px;
        margin-bottom: 18px;
    }

    .dash-card h3 {
        color: white;
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .dash-card p {
        color: rgba(255,255,255,.65);
        margin: 0;
        font-weight: 600;
    }

    .feature-section {
        padding: 35px;
        border-radius: 32px;
        background: rgba(255,255,255,.05);
        border: 1px solid rgba(255,107,26,.2);
    }

    .feature-image {
        width: 100%;
        height: 340px;
        object-fit: cover;
        border-radius: 26px;
        box-shadow: 0 20px 50px rgba(0,0,0,.45);
    }

    .feature-section h2 {
        font-family: 'Orbitron', sans-serif;
        color: white;
        font-size: 38px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .feature-section p {
        color: rgba(255,255,255,.68);
        font-size: 17px;
        line-height: 1.7;
        margin: 20px 0 30px;
    }

    @media(max-width: 768px) {
        .dashboard-hero {
            padding: 35px;
        }

        .dashboard-hero h1 {
            font-size: 36px;
        }
    }
</style>

@endsection