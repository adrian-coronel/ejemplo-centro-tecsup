<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        # expectsJson() -> Determine si la solicitud actual probablemente espera una respuesta JSON.
        return $request->expectsJson() ? null : route('login');
    }
}
