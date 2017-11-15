<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @mixin \Eloquent
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereReceiverPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Address whereUpdatedAt($value)
 */
class Address extends Model
{
    //
}
