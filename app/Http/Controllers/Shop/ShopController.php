<?php

namespace App\Http\Controllers\Shop;

use App\Models\Shop\Customer\Customer;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    protected $user;

    public function __construct()
    {
        if (session('wechat.oauth_user')) {
            $this->user = Customer::whereOpenid(session('wechat.oauth_user')->getId())->first();
            session(['med_user' => $this->user->toArray()]);
        }
    }
}
