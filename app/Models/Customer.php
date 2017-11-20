<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Customer
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $openid
 * @property string|null $unionid
 * @property string|null $nickname
 * @property string|null $head_image_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereHeadImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereUnionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereUpdatedAt($value)
 */
class Customer extends Model
{
    //
}