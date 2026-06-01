<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>HOTWHEELS Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            margin: 0;
            background: #070707;
            color: white;
            min-height: 100vh;
        }

        .user-navbar {
            position: sticky;
            top: 0;
            z-index: 999;
            background: rgba(12, 11, 30, .96);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(255,107,26,.18);
            padding: 18px 0;
        }

        .brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: 3px;
            color: #ff6b1a;
            text-decoration: none;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-menu a,
        .logout-btn {
            color: rgba(255,255,255,.82);
            text-decoration: none;
            font-weight: 700;
            border: none;
            background: transparent;
        }

        .nav-menu a:hover,
        .logout-btn:hover {
            color: #ff7a1a;
        }

        .logout-pill {
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 999px;
            padding: 8px 20px;
        }

        .page-wrap {
            padding-top: 55px;
            padding-bottom: 70px;
        }

        .hot-title {
            font-size: 64px;
            font-weight: 800;
            color: white;
        }

        .hot-title span {
            background: linear-gradient(135deg, #ff6b6b, #ff5a00);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hot-subtitle {
            color: rgba(255,255,255,.55);
            font-size: 20px;
        }

        .hot-card {
            background: linear-gradient(145deg, rgba(255,255,255,.06), rgba(255,255,255,.025));
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 28px;
            box-shadow: 0 20px 55px rgba(0,0,0,.35);
        }

        .btn-hot {
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #ff6b6b, #ff5a00);
            color: white;
            font-weight: 800;
            padding: 12px 24px;
            text-decoration: none;
        }

        .btn-hot:hover {
            color: white;
            box-shadow: 0 15px 35px rgba(255,90,0,.32);
        }

        .btn-hot-outline {
            border: 1px solid rgba(255,255,255,.22);
            border-radius: 999px;
            background: rgba(255,255,255,.05);
            color: white;
            font-weight: 800;
            padding: 12px 24px;
            text-decoration: none;
        }

        .btn-hot-outline:hover {
            color: #ff7a1a;
            border-color: rgba(255,107,26,.55);
        }
    </style>
</head>

<body>

<nav class="user-navbar">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('dashboard') }}" class="brand">HOTWHEELS</a>

        <div class="nav-menu">
            <span>👋 {{ session('user.username') }}</span>
            <a href="{{ route('dashboard') }}">Products</a>
            <a href="{{ route('cart.index') }}">Cart</a>
            <a href="{{ route('orders.history') }}">My Orders</a>

            <form method="POST" action="{{ route('logout') }}" class="m-0">
                @csrf
                <button class="logout-btn logout-pill">
                    logout →
                </button>
            </form>
        </div>
    </div>
</nav>

<div class="page-wrap">
    @yield('content')
</div>

</body>
</html>