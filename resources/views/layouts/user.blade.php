<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTWHEELS Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #0a0a0a;
            color: white;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #0f0c29 0%, #1a1a2e 100%);
            padding: 15px;
        }

        .brand-text {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
        }

        .product-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.03));
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.4s;
            overflow: hidden;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255,107,107,0.5);
        }

        .product-image {
            height: 220px;
            object-fit: contain;
            width: 100%;
            padding: 20px;
            background: rgba(0,0,0,0.3);
        }

        .btn-buy {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border: none;
            border-radius: 40px;
            padding: 10px;
            font-weight: 700;
            color: white;
        }

        .btn-buy:hover {
            color: white;
            transform: scale(1.02);
        }

        .price-tag {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .search-bar {
            background: rgba(255,255,255,0.08);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 50px;
            padding: 12px 20px;
            color: white;
            width: 100%;
        }

        .search-bar:focus {
            outline: none;
            border-color: #ff6b6b;
        }

        .table-card {
            background: linear-gradient(135deg, rgba(255,255,255,0.05), rgba(255,255,255,0.02));
            backdrop-filter: blur(10px);
            border-radius: 24px;
            border: 1px solid rgba(255,255,255,0.1);
            padding: 20px;
        }

        .btn-back {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border: none;
            border-radius: 40px;
            padding: 8px 20px;
            color: white;
            text-decoration: none;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1a1a2e;
        }

        ::-webkit-scrollbar-thumb {
            background: #ff6b6b;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-custom navbar-dark">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="brand-text">HOTWHEELS</a>

        <div class="d-flex align-items-center gap-3">
            <span class="text-white">
                👋 {{ session('user.username') }}
            </span>

            <a href="{{ route('orders.history') }}" class="btn btn-outline-light btn-sm rounded-pill px-3">
                My Orders
            </a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button class="btn btn-outline-light btn-sm rounded-pill px-3">
                    logout →
                </button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>