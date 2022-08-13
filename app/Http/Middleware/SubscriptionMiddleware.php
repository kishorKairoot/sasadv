<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SubscriptionMiddleware
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
        if (!auth()->guest() && !auth()->user()->subscribed('default') && !auth()->user()->onTrial()) {
            // code...
            return redirect()->route('admin_billing')->with(['alert' => 'You no Longer Have Active Subscription', 'alert_type' => 'warning']);
        }

        return $next($request);
    }
}
