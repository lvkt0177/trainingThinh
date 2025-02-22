<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::guard('user')->user();

        if($user)
        {
            if($user->status == 0)
            {
                Auth::guard('user')->logout();
                return redirect()->route('training.login')->with('error','Tai khoan dang Cho phe duyet');
            }

            if($user->status == 2)
            {
                Auth::guard('user')->logout();
                return redirect()->route('training.login')->with('error','Tai khoan bi Tu choi dang nhap');
            }

            if($user->status == 3)
            {
                Auth::guard('user')->logout();
                return redirect()->route('training.login')->with('error','Tai khoan cua ban Da bi khoa');
            }
        }

        return $next($request);
    }
}
