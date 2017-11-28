<?php

namespace App\Models\Shop\Customer\Traits\Relationship;

use App\Models\Shop\Beans\BeansLog;
use App\Models\Shop\Address\Address;
use App\Models\Shop\Order\Order;

/**
 * Class CustomerRelationship
 * @package App\Models\Shop\Customer\Traits\Relationship
 * @mixin \Eloquent
 */
trait CustomerRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beansLogs()
    {
        // TODO 获取结果集的数目写入配置
        return $this->hasMany(BeansLog::class)->orderBy('created_at', 'desc')->take(10);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at', 'desc')->take(10);
    }
}