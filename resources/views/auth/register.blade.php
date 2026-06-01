<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Hot Wheels</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;800&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
        radial-gradient(circle at 80% 20%,rgba(255,77,0,.35),transparent 25%),
        radial-gradient(circle at 10% 90%,rgba(255,183,71,.15),transparent 30%),
        linear-gradient(135deg,#050505,#121212,#1d0800);

    font-family:'Poppins',sans-serif;
}

.register-card{

    width:500px;

    background:rgba(255,255,255,.05);

    border:1px solid rgba(255,255,255,.1);

    border-radius:25px;

    padding:40px;

    backdrop-filter:blur(15px);

    box-shadow:0 20px 50px rgba(0,0,0,.4);

}

.logo{
    font-family:'Orbitron',sans-serif;
    font-size:28px;
    font-weight:800;

    background:linear-gradient(135deg,#ff4d00,#ffb347);

    -webkit-background-clip:text;
    -webkit-text-fill-color:transparent;
}

.form-control{
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.08);
    color:white;
}

.form-control:focus{
    background:rgba(255,255,255,.08);
    color:white;
    border-color:#ff4d00;
    box-shadow:none;
}

.btn-hot{
    background:linear-gradient(135deg,#ff4d00,#ffb347);
    border:none;
    color:white;
    font-weight:700;
}

</style>

</head>
<body>

<div class="register-card">

    <div class="text-center mb-4">

        <div class="logo">
            HOTWHEELS
        </div>

        <p class="text-secondary mt-2">
            Join the collector community
        </p>

    </div>

    <form method="POST" action="{{ route('register.process') }}">
        @csrf

        <div class="mb-3">
            <label class="text-light mb-2">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="text-light mb-2">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button class="btn btn-hot w-100 py-2">
            Register
        </button>

    </form>

</div>

</body>
</html>