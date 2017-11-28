<?php

namespace App\Models\Shop\Address;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Customer\Customer;

/**
 * App\Models\Shop\Address\Address
 *
 * @property int $id
 * @property int $customer_id
 * @property int $default
 * @property string $receiver_phone
 * @property string $receiver_name
 * @property string $province
 * @property string $city
 * @property string|null $district
 * @property string $address
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Shop\Customer\Customer $customer
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereReceiverPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Address\Address whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'default', 'receiver_phone', 'receiver_name', 'province', 'city', 'district', 'address'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
