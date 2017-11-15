<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    /**
     * ����΢�ŵ�������Ϣ
     *
     * @return string
     */
    public function serve()
    {
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {
            return "��ӭ��ע�����̳ǣ�";
        });
        return $wechat->server->serve();
    }
}
