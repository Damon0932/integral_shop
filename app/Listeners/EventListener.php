<?php

namespace App\Listeners;

use App\Events\Event;
use App\Models\Customer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;

class EventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  WeChatUserAuthorized $event
     * @return void
     */
    public function handle(WeChatUserAuthorized $event)
    {
        \Log::info($event->user);
        Customer::firstOrCreate(['openid' => $event->user->openid], [
            'open_id' => $event->user->openid,
            'unionid' => $event->user->unionid,
            'nickname' => $event->user->nickname,
            'head_image_url' => $event->user->head_image_url,
        ]);
    }
}
