<?php

namespace App\Models\Shop\Beans\Traits\Relationship;

use App\Models\Shop\Order\Order;
use App\Models\Shop\Customer\Customer;
use App\Models\Shop\Project\Project;
use App\Models\Shop\Product\Product\Product;

/**
 * Class BeansLogRelationship
 * @package App\Models\Shop\Beans\Traits\Relationship
 * @mixin \Eloquent
 */
trait BeansLogRelationship
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

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
}