<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class LogoutUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if($user && $user->status != "approved"){
            // Force Logout
            Auth::logout();
            $msg = '';
            if($user->status == "pending"){
                $msg = 'Please wait for admin approval!';
            }
            if($user->status == "suspended"){
                $msg = 'you have been suspended by admin!';
            }
            return redirect()->route('login')->withInput()->withErrors(['email' => $msg]);
        }

        return $next($request);
    }
}
