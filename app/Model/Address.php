<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Address
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereReceiverName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereReceiverPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Address whereUpdatedAt($value)
 */
class Address extends Model
{
    //
}
