<?php

namespace App\Models\Shop\Customer\Traits\Attribute;

use App\Models\Shop\Address\Address;

/**
 * Class CustomerAttribute
 * @package App\Models\Shop\Customer\Traits\Attribute
 * @mixin \Eloquent
 */
trait CustomerAttribute
{
    /**
     * @return mixed
     */
    public function getDefaultAddressAttribute()
    {
        return Address::orderBy('default')->whereCustomerId($this->id)->orderBy('default', 'asc')->first();
    }
}