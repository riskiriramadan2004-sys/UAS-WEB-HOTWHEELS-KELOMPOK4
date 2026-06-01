<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
</head>
<body>

    <h1>User Dashboard</h1>

    <a href="{{ route('products.index') }}">
        Lihat Produk
    </a>

    <br><br>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>