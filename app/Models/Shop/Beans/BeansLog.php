<?php

namespace App\Models\Shop\Beans;

use App\Models\Shop\Beans\Traits\Attribute\BeansLogAttribute;
use App\Models\Shop\Beans\Traits\Relationship\BeansLogRelationship;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop\Project\Project;
use App\Facades\Bean\Bean;

/**
 * App\Models\Shop\Beans\BeansLog
 *
 * @property int $id
 * @property int $customer_id
 * @property float|null $beans
 * @property float|null $integral
 * @property string|null $description
 * @property int|null $status
 * @property string|null $type 1.兑换 2.消费
 * @property int|null $project_id
 * @property float|null $exchanged_rate
 * @property int|null $order_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereBeans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereCustomerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereExchangedRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereIntegral($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Beans\BeansLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BeansLog extends Model
{
    use BeansLogAttribute, BeansLogRelationship;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['customer_id', 'beans', 'integral', 'description', 'status', 'type', 'project_id', 'exchanged_rate', 'order_id'];

    /**
     * @param array $options
     * @return $this|Model
     * @throws \Exception
     */
    public static function exchange(array $options)
    {
        \DB::beginTransaction();
        try {
            (new Bean())->exchangePoint($options['project_id'], $options['integral']);
            $project = Project::find($options['project_id']);
            $options['customer_id'] = session('med_user')['id'];
            $options['beans'] = $options['integral'] * $project->exchange_rate;
            $options['exchange_rate'] = $project->exchange_rate;
            $options['type'] = 1;
            $options['description'] = '积分转入M豆，您的“' . $project->project_name_cn . '”微信平台' . $options['integral'] . '积分转入';
            $beansLog = self::create($options);
            $beansLog->customer->update([$beansLog->customer->beans += $beansLog->beans]);
            \DB::commit();
            return $beansLog;
        } catch (\Exception $e) {
            \DB::rollback();
            throw new \Exception($e->getMessage());
        }
    }
}
