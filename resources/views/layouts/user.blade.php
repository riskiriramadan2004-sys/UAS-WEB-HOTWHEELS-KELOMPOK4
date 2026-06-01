<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTWHEELS // official store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background: #0a0a0a;
            overflow-x: hidden;
        }

        .navbar-blur {
            background: transparent;
            backdrop-filter: none;
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 2px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
            opacity: 0.9;
        }

        .nav-user-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            opacity: .85;
        }

        .nav-user-link:hover {
            color: #ff6b6b;
        }

        .logout-btn {
            background: transparent;
            border: none;
            color: white;
            font-weight: 600;
            opacity: .85;
        }

        .logout-btn:hover {
            color: #ff6b6b;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-blur fixed-top">
    <div class="container">
        <a href="{{ route('dashboard') }}" class="navbar-brand">
            HOTWHEELS
        </a>

        <div class="d-flex align-items-center gap-4">
            <a href="{{ route('products.index') }}" class="nav-user-link">
                Products
            </a>

            <a href="{{ route('cart.index') }}" class="nav-user-link">
                Cart
            </a>

            <a href="{{ route('orders.history') }}" class="nav-user-link">
                My Orders
            </a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button class="logout-btn">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>