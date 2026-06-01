@extends('layouts.user')

@section('content')

<!-- HERO BANNER -->
<div class="hero-banner mb-4">

    <div class="hero-content">

        <h1>HOT WHEELS COLLECTION</h1>

        <p>
            Discover rare die-cast cars, premium collections,
            and exclusive releases.
        </p>

        <a href="{{ route('products.index') }}" class="btn btn-danger btn-lg">
            Explore Products
        </a>

    </div>

</div>

<!-- STATISTICS -->

<div class="row g-4 mb-4">

    <div class="col-md-4">

        <div class="stat-card">

            <div class="stat-icon mb-3">
                <i class="fas fa-car"></i>
            </div>

            <div class="stat-value">
                {{ $total_products }}
            </div>

            <div class="stat-label">
                Available Products
            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="stat-card">

            <div class="stat-icon mb-3">
                <i class="fas fa-shopping-cart"></i>
            </div>

            <div class="stat-value">
                {{ $total_orders }}
            </div>

            <div class="stat-label">
                My Orders
            </div>

        </div>

    </div>

    <div class="col-md-4">

        <div class="stat-card">

            <div class="stat-icon mb-3">
                <i class="fas fa-star"></i>
            </div>

            <div class="stat-value">
                1968
            </div>

            <div class="stat-label">
                Founded Year
            </div>

        </div>

    </div>

</div>

<!-- ABOUT -->

<div class="stat-card mb-4">

    <div class="row align-items-center">

        <div class="col-md-4">

            <img
                src="https://images.unsplash.com/photo-1511919884226-fd3cad34687c"
                class="img-fluid rounded">

        </div>

        <div class="col-md-8">

            <h2>About Hot Wheels</h2>

            <p>
                Hot Wheels is a die-cast toy car brand introduced by Mattel in
                1968. With thousands of unique models and limited-edition
                releases, Hot Wheels has become one of the most collected toy
                brands in the world.
            </p>

        </div>

    </div>

</div>

<!-- COLLECTIONS -->

<div class="stat-card mb-4">

    <h2 class="mb-3">
        Featured Collections
    </h2>

    <div class="d-flex flex-wrap gap-2">

        <span class="badge bg-danger p-3">
            Premium Collection
        </span>

        <span class="badge bg-primary p-3">
            Boulevard Series
        </span>

        <span class="badge bg-success p-3">
            Fast & Furious
        </span>

        <span class="badge bg-warning text-dark p-3">
            Monster Trucks
        </span>

        <span class="badge bg-info text-dark p-3">
            Red Line Club
        </span>

        <span class="badge bg-secondary p-3">
            Treasure Hunt
        </span>

    </div>

</div>

<!-- TIPS -->

<div class="stat-card">

    <h2 class="mb-3">
        Collector Tips
    </h2>

    <ul>
        <li>Store cars away from direct sunlight.</li>
        <li>Keep original packaging for higher value.</li>
        <li>Follow limited-edition releases.</li>
        <li>Join collector communities.</li>
        <li>Maintain your collection inventory.</li>
    </ul>

</div>

@endsection