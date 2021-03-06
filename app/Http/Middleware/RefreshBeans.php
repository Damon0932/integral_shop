<?php

namespace App\Http\Middleware;

use App\Models\Shop\Customer\Customer;
use Closure;

class RefreshBeans
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

        if (session()->has('wechat.oauth_user')) {
            try {
                session(['med_user' => Customer::whereOpenid(session('wechat.oauth_user')->getId())->first()->toArray()]);
            } catch (\Exception $e) {
                abort(500);
            }
        }
        return $next($request);
    }
}
