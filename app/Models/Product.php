<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

/**
 * App\Models\Product
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $description
 * @property string $keyword
 * @property float $price
 * @property float $integral
 * @property int $on_sale
 * @property int $sale_counts
 * @property int $view_counts
 * @property int|null $weight
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSaleCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereViewCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereWeight($value)
 * @property int|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereOrder($value)
 * @property string $spec
 * @property string $logo_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product ordered($direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSpec($value)
 */
class Product extends Model implements Sortable
{
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

}