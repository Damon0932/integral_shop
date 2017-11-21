<?php

namespace App\Listeners;

use App\Models\Customer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Overtrue\LaravelWechat\Events\WeChatUserAuthorized;

class WeChatUserAuthorizedEventListener
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
        \Log::info($event->user->toArray());
        Customer::firstOrCreate(['openid' => $event->user->getId()], [
            'open_id' => $event->user->getId(),
            'unionid' => $event->user->getOriginal()['unionid'],
            'nickname' => $event->user->getNickname()
        ]);
    }
}
