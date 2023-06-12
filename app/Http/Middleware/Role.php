<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // si no esta identificado no le dejamos acceder
        if (!auth()->check())
            return redirect('login');

        
        // obtenemos el usuario identificado
        $user = auth()->user();
        $rolUser = $user->roles->name;

        if($rolUser == 'admin')
            return $next($request);
        
        if($rolUser == 'user' && $request->routeIs([# rutas donde puede acceder el user
            'services.index','incidents.index','incident.create',
            ]))
        {
            return $next($request);
        }

            
        abort(403, 'Acceso no autorizado.');
    }
}
