@extends('layouts.user')

@section('content')

<div class="welcome-text">
    Welcome Back!
</div>

<div class="welcome-subtext">
    Explore Hot Wheels collections and track your orders.
</div>

<div class="row g-4">

    <div class="col-md-6">
        <div class="stat-card">

            <div class="d-flex justify-content-between">

                <div>
                    <div class="stat-value">
                        {{ $total_products }}
                    </div>

                    <div class="stat-label">
                        Available Products
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-car"></i>
                </div>

            </div>

        </div>
    </div>

    <div class="col-md-6">
        <div class="stat-card">

            <div class="d-flex justify-content-between">

                <div>
                    <div class="stat-value">
                        {{ $total_orders }}
                    </div>

                    <div class="stat-label">
                        My Orders
                    </div>
                </div>

                <div class="stat-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>

            </div>

        </div>
    </div>

</div>

@endsection