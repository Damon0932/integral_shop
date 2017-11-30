<?php

namespace App\Models\Shop\Project\Traits\Attribute;
use App\Facades\Bean\Bean;

/**
 * Class ProjectAttribute
 * @package App\Models\Shop\Project\Traits\Attribute
 * @mixin \Eloquent
 */
trait ProjectAttribute
{
    /**
     * @return mixed
     */
    public function getIntegralAttribute()
    {
        return Bean::getPointByUnionId($this->redis_key, session('med_user')['unionid']);
    }
}
