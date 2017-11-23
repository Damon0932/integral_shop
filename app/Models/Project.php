<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Project
 *
 * @property int $id
 * @property string|null $project_name_en
 * @property string|null $project_name_cn
 * @property int|null $status
 * @property float $exchange_rate
 * @property string|null $ip
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\BeansLog[] $beansLogs
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereProjectNameCn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereProjectNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Project extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beansLogs()
    {
        return $this->hasMany(BeansLog::class);
    }


    /**
     * @return mixed
     */
    public function getMaxIntegralAttribute()
    {
        // TODO get integral
        return 100;
    }
}
