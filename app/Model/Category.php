<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Category
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property int $lft
 * @property int $rgt
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Category whereUpdatedAt($value)
 */
class Category extends Model
{
    //
}
