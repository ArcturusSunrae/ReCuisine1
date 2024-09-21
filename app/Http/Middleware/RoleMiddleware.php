<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Enums\Role;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        $user = Auth::user();

        // Use tryFromName to get the enum from the string role name
        $roleEnum = Role::tryFromName($role);

        // Ensure the $user->role is of the same type as $roleEnum->value
        if ($user && $roleEnum && $user->role == $roleEnum->value) {  // Use == to avoid type issues
            return $next($request); // Allow access if the role matches
        }




        // Log the role comparison for debugging
//        logger('User role from database:', ['role' => $user?->role]);
//        logger('Expected role enum value:', ['role_enum_value' => $roleEnum?->value]);


        // Return a 403 Unauthorized response if role doesn't match
        // dd($user->role, $role);
        abort(403, 'Unauthorized action.');
    }





}
