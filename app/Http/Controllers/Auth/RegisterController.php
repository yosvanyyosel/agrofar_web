<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Mostrar el formulario de registro.
     */
    public function showRegistrationForm()
    {
        $roles = [
            'admin_user'    => 'Administrador',
            'analista_user' => 'Analista',
            'insumos_user'  => 'Gestor de Insumos',
            'personal_user' => 'Gestor de Personal',
        ];
        return view('auth.register', compact('roles'));
    }

    /**
     * Procesar el registro.
     */
    public function register(Request $request)
    {
        // Validación
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role'     => ['required', 'in:admin_user,analista_user,insumos_user,personal_user'],
        ]);

        // Crear usuario
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        event(new Registered($user));

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirección según el rol
        return match ($user->role) {
            'admin_user'    => redirect()->route('admin.dashboard'),
            'analista_user' => redirect()->route('analista.dashboard'),
            'insumos_user'  => redirect()->route('insumos.dashboard'),
            'personal_user' => redirect()->route('personal.dashboard'),
            default         => redirect('/'),
        };
    }
}
