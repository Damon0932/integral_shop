<?php

namespace App\Models\Shop\Project;

use App\Models\Shop\Project\Traits\Attribute\ProjectAttribute;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Shop\Project\Project
 *
 * @property int $id
 * @property string|null $project_name_en
 * @property string|null $project_name_cn
 * @property int $status 状态 0.不启用 1.启用
 * @property float $exchange_rate
 * @property string|null $ip
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string|null $redis_key
 * @property string|null $hash_key
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereExchangeRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereHashKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereProjectNameCn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereProjectNameEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereRedisKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $api_url_exchange_point
 * @property string|null $api_private_key
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereApiPrivateKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Shop\Project\Project whereApiUrlExchangePoint($value)
 */
class Project extends Model
{
    use ProjectAttribute;
}
