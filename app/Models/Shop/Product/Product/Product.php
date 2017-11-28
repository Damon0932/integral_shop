<?php

namespace App\Models\Shop\Product\Product;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\Shop\Product\Product\Product
 *
 * @property int $id
 * @property int|null $category_id
 * @property string $name
 * @property string|null $description
 * @property string|null $keyword
 * @property string $spec
 * @property string $logo_url
 * @property float $price
 * @property float $integral
 * @property int $on_sale
 * @property int $sale_counts
 * @property int $view_counts
 * @property int|null $order
 * @property int|null $inventory
 * @property string|null $detail
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereInventory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereSaleCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereSpec($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Product\Product\Product whereViewCounts($value)
 * @mixin \Eloquent
 */
class Product extends Model implements Sortable
{
    use SortableTrait;

    /**
     * @var array
     */
    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'keyword',
        'spec',
        'logo_url',
        'price',
        'integral',
        'on_sale',
        'sale_counts',
        'view_counts',
        'order',
        'inventory',
        'detail'
    ];
}
