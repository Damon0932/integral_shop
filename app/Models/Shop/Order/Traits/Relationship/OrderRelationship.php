<?php

namespace App\Models\Shop\Order\Traits\Relationship;

use App\Models\Shop\Customer\Customer;
use App\Models\Shop\Product\Product\Product;
use App\Models\Shop\Beans\BeansLog;

/**
 * Class OrderRelationship
 * @package App\Models\Order\Traits\Relationship
 * @mixin \Eloquent
 */
trait OrderRelationship
{
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
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function beansLog()
    {
        return $this->hasOne(BeansLog::class);
    }
}