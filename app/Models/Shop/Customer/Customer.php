<?php

namespace App\Models\Shop\Customer;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Customer\Traits\Relationship\CustomerRelationship;
use App\Models\Shop\Customer\Traits\Attribute\CustomerAttribute;

/**
 * App\Models\Shop\Customer\Customer
 *
 * @property int $id
 * @property string|null $openid
 * @property string|null $unionid
 * @property string|null $nickname
 * @property string|null $head_image_url
 * @property float $beans
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereBeans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereHeadImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereUnionid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Customer\Customer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Address\Address[] $addresses
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Beans\BeansLog[] $beansLogs
 * @property-read mixed $default_address
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Shop\Order\Order[] $orders
 */
class Customer extends Model
{
    use CustomerRelationship, CustomerAttribute;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['openid', 'unionid', 'nickname', 'head_image_url', 'beans'];

}
