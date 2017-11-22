<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $customer_id
 * @property string $order_sn
 * @property float $integral_fee
 * @property int $status
 * @property string|null $remark
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereIntegralFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 */
class Order extends Model
{

    /**
     * @param $customerId
     * @param $productId
     * @param array $address
     */
    public static function create($customerId, $productId, array $address)
    {
        $product = Product::find($productId);
        $options = [
            'customer_id' => $customerId,
            //'order_sn' =>,
            'integral_fee' => $product->integral,
            'status' => 0,
        ];
        $order = parent::create($options);
        $order->addDetail($address);

        return $order;
    }

    /**
     * @param array $address
     * @return $this
     */
    public function addDetail(array $address)
    {
        return $this;
    }
}
