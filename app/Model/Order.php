<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Order
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereIntegralFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereOrderSn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereRemark($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Model\Order whereUpdatedAt($value)
 */
class Order extends Model
{
    //
}
