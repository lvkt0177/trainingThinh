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

        if (!$user) {
            return back()->with('error', 'Bạn cần đăng nhập để tiếp tục');
        }

        if ($user->status == 0) {
            Auth::guard('user')->logout();
            return back()->with('error', 'Tài khoản đang chờ phê duyệt');
        }

        if ($user->status == 2) {
            Auth::guard('user')->logout();
            return back()->with('error', 'Tài khoản bị từ chối đăng nhập');
        }

        if ($user->status == 3) {
            Auth::guard('user')->logout();
            return back()->with('error', 'Tài khoản của bạn đã bị khóa');
        }

        return $next($request);
    }
}
