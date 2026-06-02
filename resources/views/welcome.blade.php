<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTWHEELS Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            overflow-x: hidden;
            background: #050505;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hero {
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 82% 45%, rgba(255,106,0,.35), transparent 28%),
                radial-gradient(circle at 15% 80%, rgba(255,160,50,.16), transparent 26%),
                linear-gradient(110deg, #050505 0%, #0d0d12 42%, #241006 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(to right, rgba(0,0,0,.92), rgba(0,0,0,.72) 45%, rgba(0,0,0,.2)),
                repeating-linear-gradient(90deg, rgba(255,255,255,.025) 0px, rgba(255,255,255,.025) 1px, transparent 1px, transparent 80px);
            z-index: 1;
            pointer-events: none;
        }

        .navbar-custom {
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            padding: 30px 0;
            z-index: 5;
        }

        .logo {
            font-family: 'Orbitron', sans-serif;
            font-size: 38px;
            font-weight: 800;
            letter-spacing: 4px;
            text-decoration: none;
            color: #ff6b1a;
            text-shadow: 0 0 25px rgba(255,107,26,.35);
            transition: .3s ease;
        }

        .logo:hover {
            color: #ffa12b;
            transform: scale(1.05);
        }

        .hero-left {
            width: 50%;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-left: 9%;
            padding-right: 5%;
            position: relative;
            z-index: 3;
        }

        .eyebrow {
            color: #ff7a1a;
            font-size: 13px;
            font-weight: 800;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 18px;
            animation: fadeUp 1s ease;
        }

        .hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 76px;
            line-height: .98;
            font-weight: 800;
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            animation: fadeUp 1.2s ease;
        }

        .hero-title span {
            display: block;
            background: linear-gradient(135deg, #ff4d00, #ffa12b);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            min-height: 85px;
        }

        #typingText::after {
            content: "|";
            color: #ffa12b;
            animation: blink .8s infinite;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        .hero-description {
            color: rgba(255,255,255,.72);
            font-size: 21px;
            max-width: 640px;
            margin-top: 28px;
            line-height: 1.6;
            animation: fadeUp 1.5s ease;
            transition: .3s ease;
        }

        .hero-description:hover {
            color: white;
            transform: translateX(8px);
        }

        .actions {
            margin-top: 42px;
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
            animation: fadeUp 1.8s ease;
        }

        .btn-shop {
            padding: 18px 44px;
            border-radius: 50px;
            border: none;
            color: #fff;
            font-weight: 800;
            background: linear-gradient(135deg, #ff5a00, #ffa12b);
            box-shadow: 0 14px 38px rgba(255,90,0,.35), inset 0 1px 0 rgba(255,255,255,.3);
            transition: .25s ease;
            cursor: pointer;
        }

        .btn-shop:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 50px rgba(255,90,0,.48), inset 0 1px 0 rgba(255,255,255,.3);
        }

        .btn-explore {
            padding: 18px 34px;
            border-radius: 50px;
            color: white;
            font-weight: 800;
            text-decoration: none;
            border: 1px solid rgba(255,255,255,.35);
            background: rgba(255,255,255,.06);
            transition: .25s ease;
        }

        .btn-explore:hover {
            color: #ffa12b;
            border-color: #ffa12b;
            transform: translateY(-4px);
            background: rgba(255,107,26,.12);
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-right {
            position: absolute;
            top: 0;
            right: 0;
            width: 50vw;
            height: 100vh;
            z-index: 0;
            overflow: hidden;
        }

        .hero-right::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(to right, rgba(5,5,5,.88), rgba(5,5,5,.28) 36%, rgba(5,5,5,.08)),
                linear-gradient(to bottom, rgba(0,0,0,.2), rgba(0,0,0,.45));
            pointer-events: none;
        }

        .hero-right::after {
            content: "";
            position: absolute;
            inset: 35px 45px;
            border: 1px solid rgba(255,111,0,.18);
            border-radius: 36px;
            z-index: 3;
            pointer-events: none;
            box-shadow: 0 0 80px rgba(255,90,0,.18);
        }

        .hero-image {
            width: 110%;
            height: 110%;
            object-fit: cover;
            object-position: center;
            display: block;
            animation: slowZoom 16s ease-in-out infinite alternate;
            filter: saturate(1.15) contrast(1.08) brightness(.9);
        }

        @keyframes slowZoom {
            from { transform: scale(1) translateX(0); }
            to { transform: scale(1.08) translateX(-18px); }
        }

        .speed-line {
            position: absolute;
            height: 2px;
            width: 260px;
            left: 8%;
            bottom: 12%;
            background: linear-gradient(to right, transparent, rgba(255,98,0,.75), transparent);
            z-index: 2;
            animation: speedMove 2.8s linear infinite;
        }

        .speed-line:nth-child(2) {
            bottom: 16%;
            width: 180px;
            animation-delay: .8s;
        }

        .speed-line:nth-child(3) {
            bottom: 20%;
            width: 320px;
            animation-delay: 1.4s;
        }

        @keyframes speedMove {
            0% { transform: translateX(-80px); opacity: 0; }
            30% { opacity: 1; }
            100% { transform: translateX(260px); opacity: 0; }
        }

        .modal-content {
            background: rgba(18,14,18,.97);
            border: 1px solid rgba(255,112,0,.25);
            border-radius: 28px;
            color: white;
            backdrop-filter: blur(14px);
            box-shadow: 0 25px 70px rgba(0,0,0,.65);
        }

        .modal-header {
            border-bottom: 1px solid rgba(255,255,255,.1);
        }

        .modal-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 800;
            letter-spacing: 1px;
            color: #ff7a1a;
        }

        .form-control {
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.16);
            color: white;
            border-radius: 16px;
            padding: 12px 16px;
        }

        .form-control:focus {
            background: rgba(255,255,255,.12);
            border-color: #ff6b1a;
            box-shadow: 0 0 0 3px rgba(255,107,26,.2);
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,.45);
        }

        label {
            font-size: 13px;
            color: rgba(255,255,255,.85);
            margin-bottom: 8px;
        }

        .btn-auth {
            width: 100%;
            border: none;
            border-radius: 16px;
            padding: 13px;
            color: white;
            font-weight: 800;
            background: linear-gradient(135deg, #ff5a00, #ffa12b);
        }

        .auth-choice {
            border: 1px solid rgba(255,255,255,.14);
            background: rgba(255,255,255,.06);
            color: white;
            border-radius: 22px;
            padding: 22px;
            width: 100%;
            transition: .25s;
        }

        .auth-choice:hover {
            border-color: rgba(255,107,26,.7);
            transform: translateY(-4px);
            background: rgba(255,107,26,.13);
        }

        .auth-link {
            color: #ff7a1a;
            text-decoration: none;
            font-weight: 800;
            cursor: pointer;
        }

        @media(max-width: 992px) {
            .navbar-custom {
                width: 100%;
                padding: 24px 20px;
            }

            .logo {
                font-size: 28px;
            }

            .hero-left {
                width: 100%;
                min-height: 100vh;
                padding: 130px 30px 60px;
                background: rgba(0,0,0,.52);
            }

            .hero-title {
                font-size: 52px;
            }

            .hero-title span {
                min-height: 62px;
            }

            .hero-description {
                font-size: 18px;
            }

            .hero-right {
                width: 100vw;
                opacity: .45;
            }
        }

        @media(max-width: 576px) {
            .hero-title {
                font-size: 40px;
            }

            .actions {
                flex-direction: column;
            }

            .btn-shop,
            .btn-explore {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>

<body>

<section class="hero" id="home">
    <div class="speed-line"></div>
    <div class="speed-line"></div>
    <div class="speed-line"></div>

    <nav class="navbar-custom">
        <div class="container">
            <a href="{{ url('/') }}" class="logo">HOTWHEELS</a>
        </div>
    </nav>

    <div class="hero-left">
        <div>
            <div class="eyebrow">Official Die Cast Store</div>

            <h1 class="hero-title">
                Discover The
                <span id="typingText">Ultimate Collection</span>
            </h1>

            <p class="hero-description">
                Jelajahi koleksi Hot Wheels premium, edisi langka,
                dan mobil impian terbaik dengan pengalaman belanja yang cepat,
                aman, dan menyenangkan.
            </p>

            <div class="actions">
                <button class="btn-shop" data-bs-toggle="modal" data-bs-target="#authChoiceModal">
                    Shop Now →
                </button>

                <button class="btn-explore" type="button" onclick="showInfo()">
                    Explore Collection
                </button>
            </div>
        </div>
    </div>

    <div class="hero-right">
        <img src="{{ asset('uploads/Pages Awal.jpg') }}" class="hero-image" alt="Hot Wheels Collection">
    </div>
</section>

<div class="modal fade" id="infoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">HOT WHEELS COLLECTION</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="text-white-50 mb-3">
                    Temukan berbagai koleksi Hot Wheels pilihan, mulai dari model klasik,
                    mobil sport, edisi langka, hingga koleksi premium untuk para kolektor.
                </p>

                <button class="btn-auth" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#authChoiceModal">
                    Mulai Belanja →
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="authChoiceModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">START YOUR COLLECTION</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p class="text-white-50 mb-4">
                    Masuk ke akun kamu atau buat akun baru untuk mulai berbelanja.
                </p>

                <div class="d-grid gap-3">
                    <button class="auth-choice text-start"
                            data-bs-dismiss="modal"
                            data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                        <h5 class="mb-1">Login</h5>
                        <small class="text-white-50">Admin pakai username, user pakai email.</small>
                    </button>

                    <button class="auth-choice text-start"
                            data-bs-dismiss="modal"
                            data-bs-toggle="modal"
                            data-bs-target="#registerModal">
                        <h5 class="mb-1">Register</h5>
                        <small class="text-white-50">Buat akun user baru dengan email.</small>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title">HOT WHEELS LOGIN</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        Data yang dimasukkan tidak valid.
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Username / Email</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="admin atau example@gmail.com"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >
                    </div>

                    <button class="btn-auth" type="submit">
                        Login →
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small style="color:rgba(255,255,255,.55);">
                        Belum punya akun?
                        <span class="auth-link"
                              data-bs-dismiss="modal"
                              data-bs-toggle="modal"
                              data-bs-target="#registerModal">
                            Register
                        </span>
                    </small>
                </div>

                <div class="text-center mt-3">
                    <small style="color:rgba(255,255,255,.35);">
                        admin: admin / admin123
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title">JOIN HOT WHEELS</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('register.process') }}">
                    @csrf

                    <div class="mb-3">
                        <label>Email</label>
                        <input
                            type="email"
                            name="username"
                            class="form-control"
                            placeholder="example@gmail.com"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Create password"
                            required
                        >
                    </div>

                    <div class="mb-3">
                        <label>Confirm Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm password"
                            required
                        >
                    </div>

                    <button class="btn-auth" type="submit">
                        Register →
                    </button>
                </form>

                <div class="text-center mt-3">
                    <small style="color:rgba(255,255,255,.55);">
                        Sudah punya akun?
                        <span class="auth-link"
                              data-bs-dismiss="modal"
                              data-bs-toggle="modal"
                              data-bs-target="#loginModal">
                            Login
                        </span>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const words = [
            'Ultimate Collection',
            'Dream Cars',
            'Rare Edition',
            'Premium Models',
            'Limited Series'
        ];

        let wordIndex = 0;
        let charIndex = 0;
        let deleting = false;

        const typingText = document.getElementById('typingText');

        function typeEffect() {
            const currentWord = words[wordIndex];

            if (deleting) {
                typingText.textContent = currentWord.substring(0, charIndex--);
            } else {
                typingText.textContent = currentWord.substring(0, charIndex++);
            }

            if (!deleting && charIndex === currentWord.length + 1) {
                deleting = true;
                setTimeout(typeEffect, 1200);
                return;
            }

            if (deleting && charIndex === 0) {
                deleting = false;
                wordIndex = (wordIndex + 1) % words.length;
            }

            setTimeout(typeEffect, deleting ? 60 : 120);
        }

        if (typingText) {
            typeEffect();
        }
    });

    function showInfo() {
        const infoModalElement = document.getElementById('infoModal');
        const infoModal = new bootstrap.Modal(infoModalElement);
        infoModal.show();
    }
</script>

@if(session('open_login_modal'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
</script>
@endif

</body>
</html>