<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permission;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        $role = $user->role;

        if ($role->status != 1) {
            return redirect()->route('dashboard');
        }

        $route = $request->route();
        $permission = Permission::where('key', $route->getName())->first();

        if (!$permission || $permission->status !== 1) {
            return redirect()->route('dashboard');
        }

        if (!$user->role->permissions->contains($permission)) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
