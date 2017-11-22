<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductBanner
 *
 * @property int $id
 * @property int $product_id
 * @property string $banner_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $image
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductBanner whereBannerUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductBanner whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProductBanner whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Product $product
 */
class ProductBanner extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'banner_url'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    /**
     * @return mixed
     */
    public function getImageAttribute()
    {
        return '//' . config('filesystems')['disks']['qiniu']['domains']['default'] . '/' . $this->banner_url;
    }
}
