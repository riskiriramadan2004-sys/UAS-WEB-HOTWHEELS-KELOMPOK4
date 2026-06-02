<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Hotwheels</title>

    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #050505;
            color: #ffffff;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .navbar {
            width: 100%;
            padding: 28px 8%;
            background: #0c0b19;
            border-bottom: 1px solid rgba(255, 106, 0, .25);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Orbitron', sans-serif;
            color: #ff6b1a;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: 4px;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 26px;
        }

        .nav-links a,
        .nav-links span {
            color: white;
            text-decoration: none;
            font-weight: 800;
            font-size: 17px;
        }

        .logout-btn {
            padding: 14px 28px;
            border: 1px solid rgba(255,255,255,.25);
            border-radius: 40px;
        }

        .checkout-page {
            padding: 80px 8%;
            min-height: calc(100vh - 92px);
        }

        .checkout-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 60px;
        }

        .checkout-title {
            font-size: 64px;
            font-weight: 800;
            margin: 0;
        }

        .checkout-title span {
            color: #ff5a3d;
        }

        .checkout-subtitle {
            color: rgba(255,255,255,.65);
            font-size: 22px;
            margin-top: 12px;
        }

        .back-btn {
            padding: 16px 32px;
            border-radius: 40px;
            border: 1px solid rgba(255,255,255,.25);
            color: white;
            text-decoration: none;
            font-weight: 800;
            transition: .3s;
        }

        .back-btn:hover {
            color: #ff6b1a;
            border-color: #ff6b1a;
        }

        .checkout-card {
            background: rgba(255,255,255,.045);
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 32px;
            padding: 34px;
            box-shadow: 0 25px 70px rgba(0,0,0,.65);
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 1.3fr .8fr;
            gap: 34px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 24px;
        }

        .payment-box {
            background: #202428;
            border-radius: 24px;
            padding: 26px;
        }

        .payment-label {
            display: block;
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .payment-select {
            width: 100%;
            padding: 18px 20px;
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,.18);
            background: #30343a;
            color: white;
            font-size: 17px;
            font-weight: 600;
        }

        .payment-select:focus {
            outline: none;
            border-color: #ff6b1a;
            box-shadow: 0 0 0 3px rgba(255,107,26,.22);
        }

        .info-box {
            margin-top: 24px;
            background: rgba(255,107,26,.1);
            border: 1px solid rgba(255,107,26,.28);
            border-radius: 18px;
            padding: 18px;
            color: rgba(255,255,255,.78);
            line-height: 1.6;
        }

        .summary-box {
            background: #202428;
            border-radius: 24px;
            padding: 26px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 18px;
            color: rgba(255,255,255,.78);
            font-weight: 700;
        }

        .summary-total {
            border-top: 1px solid rgba(255,255,255,.14);
            padding-top: 20px;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 22px;
            font-weight: 900;
        }

        .summary-total span:last-child {
            color: #ff4d4d;
        }

        .pay-btn {
            margin-top: 30px;
            width: 100%;
            border: none;
            border-radius: 18px;
            padding: 18px;
            color: white;
            font-size: 18px;
            font-weight: 900;
            cursor: pointer;
            background: linear-gradient(135deg, #ff5a3d, #ff6b00);
            transition: .3s;
        }

        .pay-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(255,90,0,.35);
        }

        @media(max-width: 900px) {
            .checkout-grid {
                grid-template-columns: 1fr;
            }

            .checkout-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 24px;
            }

            .checkout-title {
                font-size: 46px;
            }

            .navbar {
                flex-direction: column;
                gap: 18px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">
    <a href="{{ url('/products') }}" class="logo">HOTWHEELS</a>

    <div class="nav-links">
        <span>👋 {{ session('user_email') ?? session('username') ?? 'admin@gmail.com' }}</span>
        <a href="{{ url('/products') }}">Products</a>
        <a href="{{ url('/cart') }}">Cart</a>
        <a href="{{ url('/orders') }}">My Orders</a>
        <a href="{{ url('/logout') }}" class="logout-btn">logout →</a>
    </div>
</nav>

<main class="checkout-page">
    <div class="checkout-header">
        <div>
            <h1 class="checkout-title">Checkout <span>Payment</span></h1>
            <p class="checkout-subtitle">Complete your Hot Wheels purchase securely</p>
        </div>

        <a href="{{ url('/cart') }}" class="back-btn">← Back to Cart</a>
    </div>

    <div class="checkout-card">
        <form method="POST" action="{{ url('/checkout') }}">
            @csrf

            <div class="checkout-grid">
                <div>
                    <h3 class="section-title">Payment Method</h3>

                    <div class="payment-box">
                        <label class="payment-label">Choose Payment</label>

                        <select name="payment_method" class="payment-select" required>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="COD">Cash On Delivery</option>
                            <option value="E-Wallet">E-Wallet</option>
                        </select>

                        <div class="info-box">
                            Setelah pembayaran berhasil, pesanan Anda akan masuk ke halaman
                            <b>My Orders</b> dan diproses oleh admin.
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="section-title">Order Summary</h3>

                    <div class="summary-box">
                        <div class="summary-row">
                            <span>Product Total</span>
                            <span>Rp {{ number_format($grandTotal ?? $total ?? 0, 0, ',', '.') }}</span>
                        </div>

                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>Rp 0</span>
                        </div>

                        <div class="summary-total">
                            <span>Grand Total</span>
                            <span>Rp {{ number_format($grandTotal ?? $total ?? 0, 0, ',', '.') }}</span>
                        </div>

                        <button type="submit" class="pay-btn">
                            Pay Now →
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

</body>
</html>