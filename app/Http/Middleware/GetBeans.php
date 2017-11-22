<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;

class GetBeans
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
        $beans = Customer::whereUnionid(session('med_union'))->first()->beans;
        session('med_beans', $beans);
        return $next($request);
    }
}
