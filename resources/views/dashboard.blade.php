@extends('layouts.user')

@section('content')

<style>
    .dashboard-hero {
        min-height: calc(100vh - 72px);
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
        overflow: hidden;
    }

    .btn-glow {
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        border: none;
        padding: 14px 40px;
        border-radius: 50px;
        font-weight: 700;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
    }

    .btn-glow:hover {
        transform: scale(1.05);
        box-shadow: 0 0 35px rgba(255, 107, 107, 0.6);
    }

    .floating {
        animation: floating 3s infinite ease-in-out;
    }

    @keyframes floating {
        0%, 100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    .hero-image {
        max-width: 65%;
        height: auto;
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        margin-top: -80px;
    }

    .hero-image:hover {
        transform: scale(1.02);
        box-shadow: 0 25px 50px rgba(255,107,107,0.3);
    }

    .content-left {
        position: relative;
        z-index: 2;
    }

    .image-wrapper {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media (max-width: 768px) {
        .dashboard-hero {
            padding: 80px 0;
            text-align: center;
        }

        .hero-image {
            max-width: 80%;
            margin-top: 40px;
        }
    }
</style>

<div class="dashboard-hero">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-lg-6 text-white content-left">

                <h1 class="display-3 fw-bold mb-4">
                    collect your
                    <span style="color:#ff6b6b;">hot wheels</span>
                    dreams
                </h1>

                <p class="lead mb-4 opacity-75">
                    Authentic diecast cars from Mattel. Start your collection today and race into the future!
                </p>

                <a href="{{ route('products.index') }}" class="btn btn-glow text-white">
                    shop now →
                </a>

            </div>

            <div class="col-lg-6 image-wrapper">

                <img src="{{ asset('uploads/Twin Mill.jpeg') }}"
                     alt="Hot Wheels Collection"
                     class="img-fluid floating hero-image">

            </div>

        </div>
    </div>
</div>

@endsection