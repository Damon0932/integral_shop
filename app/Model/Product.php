<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Product
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereOnSale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereSaleCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereViewCounts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Product whereWeight($value)
 */
class Product extends Model
{
    //
}
