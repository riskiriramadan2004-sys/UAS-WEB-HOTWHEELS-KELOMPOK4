<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            background:
                radial-gradient(circle at 80% 10%, rgba(255,77,0,.18), transparent 25%),
                linear-gradient(135deg, #050505, #101010, #1d0800);
            color: white;
            overflow-x: hidden;
            min-height: 100vh;
        }

        .sidebar {
            background: rgba(0,0,0,.78);
            backdrop-filter: blur(18px);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            border-right: 1px solid rgba(255,255,255,.08);
            z-index: 1000;
        }

        .logo-area {
            padding: 28px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,.08);
            margin-bottom: 18px;
        }

        .logo-area h3 {
            font-family: 'Orbitron', sans-serif;
            font-size: 25px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin: 0;
            letter-spacing: 2px;
        }

        .logo-area p {
            color: rgba(255,255,255,.55);
            font-size: 12px;
            margin-top: 6px;
            margin-bottom: 0;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,.78);
            padding: 13px 20px;
            margin: 6px 16px;
            border-radius: 16px;
            transition: .3s;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            color: white;
            box-shadow: 0 12px 28px rgba(255,77,0,.28);
            transform: translateX(4px);
        }

        .sidebar form button {
            color: rgba(255,255,255,.78);
        }

        .sidebar form button:hover {
            background: linear-gradient(135deg, #ff4d00, #ffb347) !important;
            color: white !important;
        }

        .main-content {
            margin-left: 280px;
            padding: 32px;
            min-height: 100vh;
        }

        .welcome-text {
            color: white;
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .welcome-subtext {
            color: rgba(255,255,255,.62);
            margin-bottom: 25px;
            font-size: 14px;
        }

        .stat-card,
        .table-card,
        .admin-card {
            background: rgba(255,255,255,.055);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 24px;
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 45px rgba(0,0,0,.28);
        }

        .table-card {
            overflow: hidden;
            padding: 22px;
        }

        .table-card .card-header {
            background: rgba(0,0,0,.34);
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255,255,255,.08);
            margin: -22px -22px 22px -22px;
        }

        .btn-primary-custom,
        .btn-hot {
            background: linear-gradient(135deg, #ff4d00, #ffb347);
            border: none;
            border-radius: 14px;
            padding: 10px 24px;
            font-weight: 700;
            color: white;
            text-decoration: none;
        }

        .btn-primary-custom:hover,
        .btn-hot:hover {
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255,77,0,.28);
        }

        table {
            color: white !important;
        }

        .table > :not(caption) > * > * {
            background: transparent !important;
            color: white;
            border-color: rgba(255,255,255,.1);
        }

        .table thead th {
            color: #ffb347;
            font-weight: 700;
        }

        .form-control,
        .form-select {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            color: white;
            border-radius: 14px;
        }

        .form-select option {
            background: #111;
            color: white;
        }

        .badge {
            border-radius: 999px;
            padding: 7px 12px;
        }

        @media(max-width: 768px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                margin-left: 0;
                padding: 22px;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">
    <div class="logo-area">
        <h3>HOTWHEELS</h3>
        <p>Admin Racing Panel</p>
    </div>

    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">
            <i class="fas fa-gauge-high"></i>
            Dashboard
        </a>

        <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
           href="{{ route('admin.products.index') }}">
            <i class="fas fa-car-side"></i>
            Products
        </a>

        <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
           href="{{ route('admin.orders.index') }}">
            <i class="fas fa-cart-shopping"></i>
            Orders
        </a>

        <hr style="margin: 16px; border-color: rgba(255,255,255,.12);">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                <i class="fas fa-right-from-bracket"></i>
                Logout
            </button>
        </form>
    </nav>
</div>

<div class="main-content">
    @yield('content')
</div>

</body>
</html>