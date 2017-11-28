<?php

namespace App\Models\Shop\Product\ProductBanner\Traits\Relationship;

use App\Models\Shop\Product\Product\Product;

/**
 * Class ProductBannerRelationship
 * @package App\Models\Shop\Product\ProductBanner\Traits\Relationship
 * @mixin \Eloquent
 */
trait ProductBannerRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}