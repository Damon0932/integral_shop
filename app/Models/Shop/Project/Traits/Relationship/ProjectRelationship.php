<?php

namespace App\Models\Shop\Project\Traits\Relationship;

use App\Models\Shop\Beans\BeansLog;

/**
 * Class ProjectRelationship
 * @package App\Models\Shop\Project\Traits\Relationship
 * @mixin \Eloquent
 */
trait ProjectRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beansLogs()
    {
        return $this->hasMany(BeansLog::class);
    }
}