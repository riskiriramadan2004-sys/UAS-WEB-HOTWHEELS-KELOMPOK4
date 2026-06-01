<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTWHEELS | Official Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Poppins',sans-serif;
            background:#050505;
            overflow-x:hidden;
            color:white;
        }

        .navbar-custom{
            position:fixed;
            top:0;
            width:100%;
            z-index:999;
            backdrop-filter:blur(15px);
            background:rgba(0,0,0,.55);
            border-bottom:1px solid rgba(255,255,255,.08);
        }

        .logo-hot{
            font-family:'Orbitron',sans-serif;
            font-size:28px;
            font-weight:800;
            letter-spacing:2px;
            text-decoration:none;

            background:linear-gradient(135deg,#ff4d00,#ffb347);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            background:
                radial-gradient(circle at 80% 20%,rgba(255,77,0,.35),transparent 25%),
                radial-gradient(circle at 10% 90%,rgba(255,183,71,.15),transparent 30%),
                linear-gradient(135deg,#050505,#121212,#1d0800);
        }

        .hero-title{
            font-family:'Orbitron',sans-serif;
            font-size:70px;
            font-weight:800;
            line-height:1.1;
            text-transform:uppercase;
        }

        .hero-title span{
            background:linear-gradient(135deg,#ff4d00,#ffb347);
            -webkit-background-clip:text;
            -webkit-text-fill-color:transparent;
        }

        .hero-desc{
            margin-top:20px;
            font-size:18px;
            color:rgba(255,255,255,.75);
        }

        .btn-hot{
            margin-top:30px;
            border:none;
            border-radius:50px;
            padding:14px 35px;
            color:white;
            font-weight:700;
            text-decoration:none;
            display:inline-block;

            background:linear-gradient(135deg,#ff4d00,#ffb347);

            box-shadow:0 10px 30px rgba(255,77,0,.35);
        }

        .btn-hot:hover{
            color:white;
            transform:translateY(-2px);
        }

        .btn-outline-hot{
            margin-top:30px;
            margin-left:10px;

            border:1px solid rgba(255,255,255,.2);
            border-radius:50px;

            padding:14px 35px;

            color:white;
            text-decoration:none;
            font-weight:600;
        }

        .btn-outline-hot:hover{
            border-color:#ff4d00;
            color:#ff4d00;
        }

        .car-box{
            background:rgba(255,255,255,.05);
            border:1px solid rgba(255,255,255,.08);
            border-radius:30px;
            padding:30px;

            backdrop-filter:blur(10px);

            animation:floating 3s ease-in-out infinite;
        }

        .car-box img{
            width:100%;
            height:350px;
            object-fit:contain;
        }

        @keyframes floating{
            0%,100%{
                transform:translateY(0);
            }
            50%{
                transform:translateY(-15px);
            }
        }

        .section{
            padding:100px 0;
            background:#0b0b0b;
        }

        .feature-card{
            background:rgba(255,255,255,.04);
            border:1px solid rgba(255,255,255,.08);
            border-radius:25px;
            padding:30px;
            height:100%;
        }

        .feature-card h4{
            color:#ffb347;
            font-weight:700;
        }

        footer{
            padding:25px;
            text-align:center;
            background:black;
            color:rgba(255,255,255,.6);
        }

        @media(max-width:991px){

            .hero{
                text-align:center;
                padding-top:100px;
            }

            .hero-title{
                font-size:45px;
            }

        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">

        <a href="{{ route('home') }}" class="logo-hot">
            HOTWHEELS
        </a>

        <div class="ms-auto">

            <a href="{{ route('login') }}"
               class="btn btn-sm btn-outline-light me-2">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-sm btn-warning">
                Register
            </a>

        </div>

    </div>
</nav>

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <h1 class="hero-title">
                    Collect Your
                    <span>Dream Cars</span>
                </h1>

                <p class="hero-desc">
                    Temukan koleksi Hot Wheels terbaik dengan desain ikonik,
                    harga terbaik, dan pengalaman belanja yang cepat.
                </p>

                <a href="{{ route('login') }}" class="btn-hot">
                    Shop Now
                </a>

                <a href="{{ route('register') }}" class="btn-outline-hot">
                    Join Collector
                </a>

            </div>

            <div class="col-lg-6 mt-5 mt-lg-0">

                <div class="car-box">

                    <img src="{{ asset('uploads/Twin Mill.jpeg') }}"
                         alt="Twin Mill">

                </div>

            </div>

        </div>

    </div>

</section>

<section class="section">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold">
                Why Choose Our Store?
            </h2>

            <p class="text-secondary">
                Koleksi Hot Wheels terbaik untuk para collector.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-4">

                <div class="feature-card">

                    <h4>🔥 Rare Collection</h4>

                    <p class="text-secondary mb-0">
                        Bone Shaker, Twin Mill, Camaro dan berbagai model ikonik lainnya.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <h4>⚡ Fast Checkout</h4>

                    <p class="text-secondary mb-0">
                        Sistem keranjang dan checkout yang cepat serta mudah digunakan.
                    </p>

                </div>

            </div>

            <div class="col-md-4">

                <div class="feature-card">

                    <h4>🏁 Racing Experience</h4>

                    <p class="text-secondary mb-0">
                        Tampilan website bertema racing seperti Hot Wheels Store asli.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<footer>

    © {{ date('Y') }} Hot Wheels Store - All Rights Reserved

</footer>

</body>
</html>