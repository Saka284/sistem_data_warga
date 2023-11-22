<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next)
    {
        $user = \App\Models\User::where('username', $request->username)->first();

        // Check if user exists
        if ($user) {
            if ($user->role == 'admin') {
                return redirect('admin/dashboard');
            } elseif ($user->role == 'warga') {
                return redirect('warga/dashboard');
            } elseif ($user->role == 'satpam') {
                return redirect('satpam/dashboard');
            }
        }

        // Handle the case where the user is not found or has no role
        // You might want to customize this part based on your application logic
        return $next($request);
    }
}
