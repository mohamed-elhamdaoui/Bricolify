<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureWorkerIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Only enforce for workers
        if ($user && $user->isWorker()) {
            if (!$user->isApprovedWorker()) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Your account is pending approval or has been suspended.'
                    ], 403);
                }

                return redirect()->route('dashboard')->with('error', 'Your profile must be approved by an administrator before you can perform this action.');
            }
        }

        return $next($request);
    }
}
