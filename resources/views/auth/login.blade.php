@extends('layouts.auth')

@section('content')

<div class="card login-card shadow-lg">

    <div class="card-header py-3">
        <h3>HOTWHEELS</h3>
        <small>Login System</small>
    </div>

    <div class="card-body p-4">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <div class="mb-3">
                <label>Username</label>
                <input
                    type="text"
                    name="username"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required>
            </div>

            <button
                type="submit"
                class="btn btn-danger w-100">
                Login
            </button>

        </form>

       <div class="text-center mt-3">

    <small class="text-dark">
        Don't have an account?
    </small>

    <br>

    <a href="{{ route('register') }}"
       class="fw-bold text-danger text-decoration-none">

        Register Here

    </a>

</div>
    </div>

</div>

@endsection