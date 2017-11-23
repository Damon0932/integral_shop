<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\IndexFilter
 *
 * @property int $id
 * @property string $key
 * @property string $value
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IndexFilter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IndexFilter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IndexFilter whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IndexFilter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\IndexFilter whereValue($value)
 * @mixin \Eloquent
 */
class IndexFilter extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key',
        'value'
    ];
}
