<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            // Check the user's role
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard'); // Redirect admin to dashboard
            } elseif ($user->role === 'customers') {
                return redirect()->intended('/'); // Redirect customers to home
            }
        }

        return back()->with(['status' => 'Email atau password salah',]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with(['status' => 'Logout Successfully']);
    }
}
