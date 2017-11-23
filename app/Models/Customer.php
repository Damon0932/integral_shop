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
 * @property float|null $beans
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Customer whereBeans($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BeansLog[] $beansLogs
 */
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['openid', 'unionid', 'nickname', 'head_image_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beansLogs()
    {
        return $this->hasMany(BeansLog::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
