<?php

namespace App\Http\Middleware;

use App\Alert;
use Closure;
use Illuminate\Contracts\Session\Session;

class Alerts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $alertsCount = Alert::count();
        $messageCount = current_user()->messages()->where('read', false)->count();
        session(['alertsCount' => $alertsCount, 'messagesCount' => $messageCount]);

        return $response;
    }
}