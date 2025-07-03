<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required', 'string'],
        ]);

        // Autenticación incluyendo el rol
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'],
            'role' => $credentials['role'],
        ])) {
            $request->session()->regenerate();

            // Redirección según el rol
            switch (Auth::user()->role) {
                case 'admin_user':
                    return redirect()->route('admin.dashboard');
                case 'analista_user':
                    return redirect()->route('analista.dashboard');
                case 'insumos_user':
                    return redirect()->route('insumos.dashboard');
                case 'personal_user':
                    return redirect()->route('personal.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors('Rol no válido.');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales o el rol son incorrectos.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
