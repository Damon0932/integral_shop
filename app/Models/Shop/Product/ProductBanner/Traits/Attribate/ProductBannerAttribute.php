<?php

namespace App\Models\Shop\Product\ProductBanner\Traits\Attribute;

/**
 * Class ProductBannerAttribute
 * @package App\Models\Shop\Product\ProductBanner\Traits\Attribute
 * @mixin \Eloquent
 */
trait ProductBannerAttribute
{
    /**
     * @return mixed
     */
    public function getImageAttribute()
    {
        return '//' . config('filesystems')['disks']['qiniu']['domains']['default'] . '/' . $this->banner_url;
    }
}