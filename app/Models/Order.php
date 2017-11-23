<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property string $order_sn
 * @property float $integral_fee
 * @property int $status
 * @property string|null $remark
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Customer $customer
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIntegralFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $product_id
 * @property float $beans_fee
 * @property float $price_fee
 * @property string|null $shipping_no
 * @property string|null $address_phone
 * @property string|null $address_name
 * @property string|null $address_province
 * @property string|null $address_city
 * @property string|null $address_district
 * @property string|null $address_detail
 * @property string|null $delivered_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddressProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereBeansFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePriceFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereShippingNo($value)
 * @property-read \App\Models\BeansLog $beansLog
 */
class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
        'product_id',
        'order_sn',
        'beans_fee',
        'price_fee',
        'status',
        'remark',
        'shipping_no',
        'address_phone',
        'address_name',
        'address_province',
        'address_city',
        'address_district',
        'address_detail',
        'delivered_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function beansLog()
    {
        return $this->hasOne(BeansLog::class);
    }


    /**
     * @return string
     */
    public function generateOrderSn()
    {
        $orderSn = date('YmdHis') . rand(10000000, 99999999);
        $id = $this->id;
        for ($i = 0; $i < strlen($orderSn); $i++) {
            $id += (int)(substr($orderSn, $i, 1));
        }
        return $this->update([
            'order_sn' => $orderSn . str_pad((100 - $id % 100) % 100, 2, '0', STR_PAD_LEFT)
        ]);
    }
}
