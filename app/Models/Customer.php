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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $orders
 * @property-read mixed $default_address
 */
class Customer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['openid', 'unionid', 'nickname', 'head_image_url', 'beans'];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany(Order::class)->orderBy('created_at', 'desc');
    }

    /**
     * @return mixed
     */
    public function getDefaultAddressAttribute()
    {
        return Address::orderBy('default')->whereCustomerId($this->id)->orderBy('default', 'asc')->first();
    }
}
