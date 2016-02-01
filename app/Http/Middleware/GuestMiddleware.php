<?php namespace App\Http\Middleware;

use App\Model\Config;
use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GuestMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Config::getConfigValueByKey('is_open')) {
            return $next($request);
        }
        if (! Session::has('user')) {
            return Redirect::to('/auth');
        }
        return $next($request);
    }

}
