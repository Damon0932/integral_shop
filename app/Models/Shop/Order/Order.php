<?php

namespace App\Models\Shop\Order;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Order\Traits\Attribute\OrderAttribute;
use App\Models\Shop\Order\Traits\Relationship\OrderRelationship;
use App\Models\Shop\Product\Product\Product;
use App\Models\Shop\Beans\BeansLog;
use App\Models\Shop\Customer\Customer;

/**
 * App\Models\Shop\Order\Order
 *
 * @property int $id
 * @property int $customer_id
 * @property int $product_id
 * @property string|null $order_sn
 * @property float $beans_fee
 * @property float $price_fee
 * @property int $status
 * @property string|null $remark
 * @property string|null $shipping_no
 * @property string|null $address_phone
 * @property string|null $address_name
 * @property string|null $address_province
 * @property string|null $address_city
 * @property string|null $address_district
 * @property string|null $address_detail
 * @property string|null $delivered_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Shop\Beans\BeansLog $beansLog
 * @property-read \App\Models\Shop\Customer\Customer $customer
 * @property-read \App\Models\Shop\Product\Product\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressDistrict($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereAddressProvince($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereBeansFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order wherePriceFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereShippingNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Order\Order whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    use OrderRelationship;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'product_id', 'order_sn', 'beans_fee', 'price_fee',
        'status', 'remark', 'shipping_no', 'address_phone', 'address_name',
        'address_province', 'address_city', 'address_district', 'address_detail', 'delivered_at'
    ];

    /**
     * @param array $options
     * @return mixed
     */
    public static function create(array $options = [])
    {
        return \DB::transaction(function () use ($options) {
            $product = Product::find($options['product_id']);
            $options['beans_fee'] = $product->integral;
            $options['price_fee'] = $product->price;
            $order = self::create($options);

            $customer = Customer::find($options['customer_id']);
            $customer->update([
                'beans' => $customer->beans - $product->integral
            ]);

            BeansLog::create([
                'customer_id' => $customer->id,
                'order_id' => $order->id,
                'beans' => $order->beans_fee,
                'type' => 2,
                'description' => '兑换' . $product->name,
            ]);
            // TODO 队列
            $product->update([
                'sale_count' => Order::whereProductId($product->id)->count()
            ]);
            $order->generateOrderSn();
            return $order;
        });
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
