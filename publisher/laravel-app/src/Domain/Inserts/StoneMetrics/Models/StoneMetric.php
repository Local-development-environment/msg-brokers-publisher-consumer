<?php

namespace Domain\Inserts\StoneMetrics\Models;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoneMetric extends Model
{
    protected $table = StoneMetricEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = StoneMetricEnum::TYPE_RESOURCE->value;

    public function insert(): HasOne
    {
        return $this->hasOne(Insert::class, InsertEnum::PRIMARY_KEY->value);
    }
}
