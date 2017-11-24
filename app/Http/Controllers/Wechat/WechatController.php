<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{
    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            return "欢迎关注积分商城！";
        });
        return $wechat->server->serve();
    }


    public function menu()
    {
        $wechat = app('wechat');
        $buttons = [
            [
                "type" => "view",
                "name" => "我要兑换",
                "url" => route('product.index')
            ],
            [
                "type" => "view",
                "name" => "兑换记录",
                "url" => route('order.index')
            ],
            [
                "type" => "view",
                "name" => "我的M豆",
                "url" => route('beans.index')
            ],
        ];
        $result = $wechat->menu->add($buttons);
        if ($result) {
            return 'success';
        } else {
            return 'failed';
        }
    }
}
