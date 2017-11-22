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
 */
class BeansLog extends Model
{
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
}
