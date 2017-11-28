<?php

namespace App\Models\Shop\Product\ProductBanner;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\Product\ProductBanner\ProductBanner
 *
 * @property int $id
 * @property int $product_id
 * @property string $banner_url
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\ProductBanner\ProductBanner whereBannerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\ProductBanner\ProductBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\ProductBanner\ProductBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\ProductBanner\ProductBanner whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\ProductBanner\ProductBanner whereUpdatedAt($value)
 */
class ProductBanner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'banner_url'];
}
