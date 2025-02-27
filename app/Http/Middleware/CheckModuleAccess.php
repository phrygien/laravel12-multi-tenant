<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $moduleName): Response
    {
        $user = Auth::user();

        // Vérifier si l'utilisateur est authentifié et a accès au module
        if (!$user || !$user->accessibleModules()->contains('name', $moduleName)) {
            abort(403, 'Vous n\'avez pas les permissions nécessaires pour accéder à ce module.');
        }
        

        return $next($request);
    }
}