<?php

namespace App\Models\Shop\Beans\Traits\Attribute;

/**
 * Class BeansLogAttribute
 * @package App\Models\Shop\Beans\Traits\Attribute
 * @mixin \Eloquent
 */
trait BeansLogAttribute
{
    /**
     * @return mixed
     */
    public function getTypeNameAttribute()
    {
        if ($this->type == 1) {
            return $this->project->project_name_cn . '积分转入迈豆';
        } elseif ($this->type == 2) {
            return $this->order->product->name . '商品兑换';
        } else {
            return '未知操作';
        }
    }
}