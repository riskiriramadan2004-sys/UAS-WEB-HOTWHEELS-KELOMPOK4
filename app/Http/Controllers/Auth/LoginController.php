<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (session()->has('user')) {

            if (session('user.role') === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = DB::table('users')
            ->where('username', $request->username)
            ->first();

        if (!$user) {
            return back()->with('error', 'Username tidak ditemukan');
        }

        if ($user->password !== md5($request->password)) {
            return back()->with('error', 'Password salah');
        }

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]
        ]);

        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->forget('user');

        return redirect('/login');
    }

    public function showRegister()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'username' => 'required|unique:users,username',
        'password' => 'required|min:3',
    ]);

    DB::table('users')->insert([
        'username' => $request->username,
        'password' => md5($request->password),
        'role' => 'user',
        'created_at' => now(),
    ]);

    return redirect('/login')
        ->with('success', 'Account created successfully');
}
}