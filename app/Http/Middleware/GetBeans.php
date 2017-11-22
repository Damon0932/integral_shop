<?php

namespace App\Http\Middleware;

use App\Models\Customer;
use Closure;
use Illuminate\Support\Facades\Session;

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
        if (session('med_union')) {
            $beans = Customer::whereUnionid(session('med_union'))->first()->beans;
            session(['med_beans' => $beans]);
        } else {
            session(['med_beans' => 0]);
        }
        return $next($request);
    }
}
