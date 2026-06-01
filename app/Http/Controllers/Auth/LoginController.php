<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLogin()
    {
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

        if (!$user || $user->password !== md5($request->password)) {
            return redirect()
                ->back()
                ->with('error', 'Username atau password salah');
        }

        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
            ]
        ]);

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->forget('user');
        session()->flush();

        return redirect('/');
    }
}