<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel // HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * { font-family: 'Plus Jakarta Sans', sans-serif; }

        body {
            background: #0a0a0a;
            color: white;
            overflow-x: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #0f0c29 0%, #1a1a2e 100%);
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            border-right: 1px solid rgba(255,107,107,0.2);
            z-index: 1000;
        }

        .logo-area {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,107,107,0.2);
            margin-bottom: 20px;
        }

        .logo-area h3 {
            font-size: 24px;
            font-weight: 800;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 0;
        }

        .logo-area p {
            color: rgba(255,255,255,0.7);
            font-size: 12px;
            margin-top: 5px;
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 12px;
            transition: all 0.3s;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            color: white;
            box-shadow: 0 5px 15px rgba(255,107,107,0.3);
        }

        .main-content {
            margin-left: 280px;
            padding: 25px 30px;
        }

        .welcome-text {
            color: #ffffff;
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .welcome-subtext {
            color: rgba(255,255,255,0.7);
            margin-bottom: 25px;
            font-size: 14px;
        }

        .stat-card {
            background: linear-gradient(135deg, #1e1a3a 0%, #2a2547 100%);
            border-radius: 20px;
            border: 1px solid rgba(255,107,107,0.3);
            padding: 20px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 800;
            color: #ffffff;
        }

        .stat-label {
            color: rgba(255,255,255,0.85);
            font-size: 14px;
            font-weight: 500;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            background: rgba(255,107,107,0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #ff6b6b;
        }

        .table-card {
            background: #1a162e;
            border-radius: 24px;
            border: 1px solid rgba(255,107,107,0.2);
            overflow: hidden;
        }

        .table-card .card-header {
            background: #0f0c1f;
            padding: 18px 24px;
            border-bottom: 1px solid rgba(255,107,107,0.2);
        }

        .table-card .card-header h5 {
            margin: 0;
            color: #ffffff;
            font-weight: 700;
        }

        .table-card .card-body {
            padding: 20px;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            color: white;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="logo-area">
            <h3>HOTWHEELS</h3>
            <p>Admin Panel</p>
        </div>

     <nav class="nav flex-column">

    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
        <i class="fas fa-tachometer-alt"></i> Dashboard
    </a>

    <a class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
       href="{{ route('admin.products.index') }}">
        <i class="fas fa-car"></i> Products
    </a>

    <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}"
       href="{{ route('admin.orders.index') }}">
        <i class="fas fa-shopping-cart"></i> Orders
    </a>

    <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}"
       href="{{ route('admin.users.index') }}">
        <i class="fas fa-users"></i> Users
    </a>

</nav>

            <hr style="margin: 15px; border-color: rgba(255,107,107,0.2);">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </nav>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

</body>
</html>