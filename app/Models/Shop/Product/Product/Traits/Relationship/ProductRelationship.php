<?php

namespace App\Models\Shop\Product\Product\Traits\Relationship;

use App\Models\Shop\Order\Order;
use App\Models\Shop\Product\ProductBanner\ProductBanner;

/**
 * Class ProductRelationship
 * @package App\Models\Shop\Product\Product\Traits\Relationship
 * @mixin \Eloquent
 */
trait ProductRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function banners()
    {
        return $this->hasMany(ProductBanner::class);
    }

    /**
     * @return mixed
     */
    public function getLogoAttribute()
    {
        return '//' . config('filesystems')['disks']['qiniu']['domains']['default'] . '/' . $this->logo_url;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}