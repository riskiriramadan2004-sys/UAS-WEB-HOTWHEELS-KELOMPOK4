<!DOCTYPE html>
<html>
<head>

    <title>Register | HOTWHEELS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#0a0a0a;
            color:white;
            height:100vh;

            display:flex;
            justify-content:center;
            align-items:center;
        }

        .register-box{

            width:420px;

            background:#1a162e;

            padding:40px;

            border-radius:20px;

            border:1px solid rgba(255,107,107,.2);
        }

        .logo{

            text-align:center;

            margin-bottom:30px;
        }

        .logo h1{
            color:#ff6b6b;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="register-box">

    <div class="logo">

        <h1>HOTWHEELS</h1>

        <p>Create New Account</p>

    </div>

    <form action="{{ route('register.process') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label>Username</label>

            <input
                type="text"
                name="username"
                class="form-control">

        </div>

        <div class="mb-3">

            <label>Password</label>

            <input
                type="password"
                name="password"
                class="form-control">

        </div>

        <button
            class="btn btn-danger w-100">

            Register

        </button>

    </form>

    <div class="text-center mt-3">

        <a href="{{ route('login') }}"
           class="text-light">

            Already have account?

        </a>

    </div>

</div>

</body>
</html>