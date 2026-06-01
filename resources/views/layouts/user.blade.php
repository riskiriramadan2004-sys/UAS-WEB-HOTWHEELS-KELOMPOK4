<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTWHEELS Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background:
                radial-gradient(circle at 80% 20%, rgba(255, 77, 0, .18), transparent 25%),
                linear-gradient(135deg, #050505, #111111, #1d0800);
            color: white;
            min-height: 100vh;
        }

        .navbar-custom {
            background: rgba(0, 0, 0, .72);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,.08);
            padding: 16px 0;
        }

        .brand-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 26px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: 2px;
        }

        .nav-btn {
            border-radius: 999px;
            padding: 8px 18px;
            font-weight: 600;
        }

        .btn-hot {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            border: none;
            color: white;
        }

        .btn-hot:hover {
            color: white;
            transform: translateY(-2px);
        }

        .glass-card,
        .product-card,
        .table-card {
            background: rgba(255,255,255,.055);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 24px;
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 45px rgba(0,0,0,.28);
        }

        .product-card {
            transition: .35s;
            overflow: hidden;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255,77,0,.45);
        }

        .product-image {
            height: 220px;
            object-fit: contain;
            width: 100%;
            padding: 22px;
            background: rgba(0,0,0,.34);
        }

        .btn-buy {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            border: none;
            border-radius: 999px;
            padding: 10px;
            font-weight: 700;
            color: white;
        }

        .price-tag {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .search-bar,
        .form-control,
        .form-select {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            border-radius: 16px;
            color: white;
        }

        .search-bar {
            border-radius: 999px;
            padding: 13px 20px;
            width: 100%;
        }

        .search-bar:focus,
        .form-control:focus,
        .form-select:focus {
            outline: none;
            background: rgba(255,255,255,.1);
            border-color: #ff4d00;
            color: white;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,.5);
        }

        table {
            color: white !important;
        }

        .table > :not(caption) > * > * {
            background: transparent !important;
            color: white;
            border-color: rgba(255,255,255,.1);
        }

        .btn-back {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            border: none;
            border-radius: 999px;
            padding: 9px 22px;
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #111;
        }

        ::-webkit-scrollbar-thumb {
            background: #ff4d00;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom navbar-dark">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="brand-text">HOTWHEELS</a>

        <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end">
            <span class="text-white-50 me-2">
                👋 {{ session('user.username') }}
            </span>

            <a href="{{ route('products.index') }}" class="btn btn-outline-light btn-sm nav-btn">
                Products
            </a>

            <a href="{{ route('cart.index') }}" class="btn btn-hot btn-sm nav-btn">
                Cart
            </a>

            <a href="{{ route('orders.history') }}" class="btn btn-outline-light btn-sm nav-btn">
                My Orders
            </a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button class="btn btn-outline-warning btn-sm nav-btn">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>