<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Customer
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $openid
 * @property string|null $unionid
 * @property string|null $nickname
 * @property string|null $head_image_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereHeadImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereUnionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Customer whereUpdatedAt($value)
 */
class Customer extends Model
{
    //
}
