<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

    <title>Login // HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .blob {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            filter: blur(80px);
            opacity: 0.3;
            animation: float 10s infinite ease-in-out;
        }

        .blob:nth-child(1) {
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .blob:nth-child(2) {
            bottom: -200px;
            right: -200px;
            animation-delay: 5s;
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        @keyframes float {
            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(50px, 50px) scale(1.1);
            }
        }

        .container-custom {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 32px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            width: 100%;
            max-width: 450px;
            margin: 20px;
        }

        .login-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 107, 107, 0.5);
        }

        .card-inner {
            padding: 40px 32px;
        }

        .hotwheels-brand {
            font-size: 36px;
            font-weight: 800;
            letter-spacing: 3px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff8c42 50%, #ee5a24 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .hotwheels-sub {
            font-size: 11px;
            color: rgba(255,255,255,0.55);
            letter-spacing: 1.5px;
            margin-top: 8px;
            display: block;
        }

        .signin-text {
            font-size: 13px;
            color: rgba(255,255,255,0.65);
            margin-top: 12px;
            margin-bottom: 25px;
        }

        label {
            font-weight: 500;
            font-size: 13px;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.85);
            display: block;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            padding: 12px 16px;
            color: white;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #ff6b6b;
            box-shadow: 0 0 0 3px rgba(255, 107, 107, 0.2);
            color: white;
            outline: none;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .btn-login {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
            border: none;
            border-radius: 16px;
            padding: 12px;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-login:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.4);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0 15px;
            color: rgba(255,255,255,0.35);
            font-size: 11px;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .divider::before {
            margin-right: 12px;
        }

        .divider::after {
            margin-left: 12px;
        }

        .demo-text {
            color: rgba(255, 255, 255, 0.45);
            font-size: 11px;
        }

        .error-box {
            background: rgba(220, 53, 69, 0.18);
            color: #ffb3b3;
            border: 1px solid rgba(220, 53, 69, 0.35);
            border-radius: 16px;
            padding: 10px 14px;
            font-size: 13px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>

    <div class="blob"></div>
    <div class="blob"></div>

    <div class="container-custom">
        <div class="login-card">
            <div class="card-inner">

                <div class="text-center">
                    <span class="hotwheels-brand">HOT WHEELS</span>
                    <div class="hotwheels-sub">OFFICIAL DIE CAST STORE</div>
                    <div class="signin-text">sign in to continue your collection</div>
                </div>

                @if(session('error'))
                    <div class="error-box">
                        {{ session('error') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="error-box">
                        Username atau password tidak valid.
                    </div>
                @endif

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf

                    <div class="mb-3">
                        <label>username</label>
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Enter your username"
                            value="{{ old('username') }}"
                            required
                            autofocus
                        >
                    </div>

                    <div class="mb-3">
                        <label>password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Enter your password"
                            required
                        >
                    </div>

                    <button type="submit" class="btn-login text-white">
                        login →
                    </button>
                </form>

                <div class="divider">
                    demo account
                </div>

                <div class="text-center">
                    <small class="demo-text">
                        admin / admin123 &nbsp;|&nbsp; user1 / user123
                    </small>
                </div>

            </div>
        </div>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'success!',
                text: @json(session('success')),
                background: '#1a1a2e',
                color: '#fff',
                confirmButtonColor: '#ff6b6b'
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'oops!',
                text: @json(session('error')),
                background: '#1a1a2e',
                color: '#fff',
                confirmButtonColor: '#ff6b6b'
            });
        </script>
    @endif

</body>
</html>