<?php

namespace Domain\Inserts\StoneMetrics\Models;

use Domain\Inserts\StoneMetrics\Enums\StoneMetricEnum;
use Domain\Jewelleries\JewelleryBuilder\Properties\Insert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoneMetric extends Model
{
    protected $table = StoneMetricEnum::TABLE->value;

    public const string TYPE_RESOURCE = StoneMetricEnum::RESOURCE->value;

    public function inserts(): HasOne
    {
        return $this->hasOne(Insert::class);
    }
}
