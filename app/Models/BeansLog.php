<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BeansLog
 *
 * @property int|null $customer_id
 * @property int|null $project_id
 * @property float $exchanged_rate
 * @property float $beans
 * @property float $integral
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Customer|null $customer
 * @property-read \App\Models\Project|null $project
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereBeans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereExchangedRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $order_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereOrderId($value)
 * @property string|null $description
 * @property-read \App\Models\Order|null $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereDescription($value)
 * @property int|null $status
 * @property string|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\BeansLog whereType($value)
 */
class BeansLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'beans', 'integral', 'description', 'status', 'type', 'project_id', 'exchanged_rate', 'order_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

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
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return mixed
     */
    public function getTypeNameAttribute()
    {
        if ($this->type == 1) {
            return $this->project->name . '积分转入迈豆';
        } elseif ($this->type == 2) {
            return $this->order->product->name . '商品兑换';
        } else {
            return '未知操作';
        }
    }

    public function exchangeValidate(array $options)
    {

    }

    /**
     * @param array $options
     */
    public static function exchange(array $options)
    {
        //$this->exchangeValidate($options);
        $project = Project::find($options['project_id']);
        $options['customer_id'] = session('med_user')['id'];
        $options['beans'] = $options['integral'] * $project->exchanged_rate;
        $options['exchanged_rate'] = $options['integral'] * $project->exchanged_rate;
        $options['type'] = 1;
        $options['description'] = '积分转入M豆，您的“' . $project->project_name_cn . '”微信平台' . $options['integral'] . '积分转入';
        BeansLog::create($options);
        // TODO redis 扣除积分
    }
}
