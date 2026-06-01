<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login // HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            min-height: 100vh;
            margin: 0;
            background:
                radial-gradient(circle at 18% 10%, rgba(255,90,0,.18), transparent 28%),
                radial-gradient(circle at 80% 80%, rgba(160,190,255,.18), transparent 30%),
                linear-gradient(135deg, #0f0c29, #302b63, #24243e);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .login-card {
            width: 100%;
            max-width: 520px;
            padding: 45px 38px;
            border-radius: 32px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.18);
            box-shadow: 0 30px 70px rgba(0,0,0,.35);
            backdrop-filter: blur(16px);
        }

        .brand {
            font-family: 'Orbitron', sans-serif;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 4px;
            color: #ff7a1a;
            text-align: center;
        }

        .brand-sub {
            text-align: center;
            color: rgba(255,255,255,.45);
            letter-spacing: 3px;
            font-size: 12px;
            margin-top: 10px;
        }

        .signin-text {
            text-align: center;
            color: rgba(255,255,255,.68);
            margin: 22px 0 32px;
        }

        label {
            color: rgba(255,255,255,.82);
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-control {
            background: rgba(255,255,255,.86);
            border: 1px solid rgba(255,107,26,.35);
            color: #111;
            border-radius: 16px;
            padding: 14px 18px;
        }

        .form-control:focus {
            border-color: #ff6b1a;
            box-shadow: 0 0 0 3px rgba(255,107,26,.22);
        }

        .btn-login {
            width: 100%;
            border: none;
            border-radius: 16px;
            padding: 14px;
            margin-top: 8px;
            color: white;
            font-weight: 800;
            background: linear-gradient(135deg, #ff6b6b, #ff5a00);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 26px 0 18px;
            color: rgba(255,255,255,.35);
            font-size: 12px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(255,255,255,.18);
        }

        .divider span {
            padding: 0 14px;
        }

        .demo {
            color: rgba(255,255,255,.48);
            text-align: center;
            font-size: 13px;
        }

        .register-link {
            text-align: center;
            color: rgba(255,255,255,.65);
            margin-top: 18px;
        }

        .register-link a {
            color: #ff6b6b;
            font-weight: 800;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="brand">HOT WHEELS</div>
    <div class="brand-sub">OFFICIAL DIE CAST STORE</div>
    <div class="signin-text">sign in to continue your collection</div>

    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mb-3">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mb-3">
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
                value="{{ old('username') }}"
                placeholder="Enter your username"
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

        <button type="submit" class="btn-login">
            login →
        </button>
    </form>

    <div class="divider">
        <span>demo account</span>
    </div>

    <div class="demo">
        admin / admin123 | user1 / user123
    </div>

    <div class="register-link">
        Belum punya akun?
        <a href="{{ route('register') }}">register</a>
    </div>

</div>

</body>
</html>