<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
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
            ->with('success', 'Registrasi berhasil, silakan login');
    }
}