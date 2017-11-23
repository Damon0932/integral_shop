<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Support\Facades\Session;

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
        if (session('med_user')) {
            session(['med_user' => Customer::find(session('med_user')['id'])->toArray()]);
        } else {
            session(['med_user' => Customer::whereOpenid(session('wechat.oauth_user')->getId())->toArray()]);
        }
        return $next($request);
    }
}
