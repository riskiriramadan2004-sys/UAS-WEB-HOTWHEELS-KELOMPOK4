<!DOCTYPE html>
<html>
<head>
    <title>User Panel // HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body{
            background:#0a0a0a;
            color:white;
        }

        .sidebar{
            width:280px;
            min-height:100vh;
            position:fixed;
            background:linear-gradient(180deg,#0f0c29,#1a1a2e);
            border-right:1px solid rgba(255,107,107,.2);
        }

        .main-content{
            margin-left:280px;
            padding:30px;
        }

        .logo{
            padding:25px;
            text-align:center;
            border-bottom:1px solid rgba(255,107,107,.2);
        }

        .logo h3{
            color:#ff6b6b;
            font-weight:800;
        }

        .nav-link{
            color:white;
            margin:8px 15px;
            border-radius:12px;
            padding:12px 18px;
        }

        .nav-link:hover,
        .nav-link.active{
            background:linear-gradient(135deg,#ff6b6b,#ee5a24);
            color:white;
        }

        .card-custom{
            background:#1a162e;
            border:1px solid rgba(255,107,107,.2);
            border-radius:20px;
        }

        .welcome-text{
    font-size:42px;
    font-weight:700;
    margin-bottom:10px;
}

.welcome-subtext{
    color:#cfcfcf;
    font-size:18px;
    margin-bottom:30px;
}

.hero-banner{
    height:350px;

    border-radius:25px;

    background:
    linear-gradient(
        rgba(0,0,0,.55),
        rgba(0,0,0,.55)
    ),
    url('https://images.unsplash.com/photo-1503376780353-7e6692767b70');

    background-size:cover;
    background-position:center;

    display:flex;
    align-items:center;

    padding:50px;

    margin-bottom:30px;
}

.hero-content h1{
    font-size:60px;
    font-weight:800;
}

.hero-content p{
    font-size:20px;
    max-width:600px;
}

.stat-card{
    background:#1a162e;

    border:1px solid rgba(255,107,107,.2);

    border-radius:20px;

    padding:25px;

    height:100%;

    transition:.3s;
}

.stat-card:hover{
    transform:translateY(-5px);

    border-color:#ff6b6b;
}

.stat-value{
    font-size:36px;
    font-weight:700;
}

.stat-label{
    color:#cfcfcf;
}

.stat-icon{
    font-size:30px;
    color:#ff6b6b;
}

.badge{
    font-size:14px;
}
    </style>
</head>

<body>

<div class="sidebar">

    <div class="logo">
        <h3>HOTWHEELS</h3>
        <small>User Panel</small>
    </div>

    <nav class="nav flex-column">

        <a class="nav-link"
           href="{{ route('dashboard') }}">
            <i class="fas fa-home"></i>
            Dashboard
        </a>

        <a class="nav-link"
           href="{{ route('products.index') }}">
            <i class="fas fa-car"></i>
            Products
        </a>

        <a class="nav-link"
           href="#">
            <i class="fas fa-shopping-cart"></i>
            Cart
        </a>

        <a class="nav-link"
           href="{{ route('cart.index') }}">
            <i class="fas fa-box"></i>
            My Orders
        </a>

        <hr>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button class="nav-link border-0 bg-transparent text-start w-100">
                <i class="fas fa-sign-out-alt"></i>
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