<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$roles)
    {
        // Si no está autenticado, abortar
        if (!Auth::check()) {
            abort(403, 'No tienes permiso para acceder a este recurso.');
        }

        $userRole = Auth::user()->role;

        // Si es admin_user, acceso total
        if ($userRole === 'admin_user') {
            return $next($request);
        }

        // Si su rol está en los permitidos, acceso
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Si no, acceso denegado
        abort(403, 'No tienes permiso para acceder a este recurso.');
    }
}
