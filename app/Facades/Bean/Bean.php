<?php

namespace App\BasicShop\Bean;

/**
 * Class Bean
 * @package App\Facades\Bean
 */
class Bean
{
    protected $unionid;
    protected $user;

    public function __construct()
    {
        $this->user = session('wechat.oauth_user');
        $this->unionid = $this->user->original['unionid'];
    }

}