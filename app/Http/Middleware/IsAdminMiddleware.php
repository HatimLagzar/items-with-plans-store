<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var ?User $user */
        $user = auth()->guard('admin')->user();
        if ( ! $user instanceof User || $user->isAdmin() === false) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
