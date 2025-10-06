<?php

namespace Domain\Inserts\Inserts\Models;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Insert extends Model
{
    protected $table = InsertEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function stoneMetric(): BelongsTo
    {
        return $this->belongsTo(StoneMetric::class, InsertEnum::FK_METRIC->value);
    }

    public function optionalInfo(): HasOne
    {
        return $this->hasOne(OptionalInfo::class);
    }

    public function insertStone(): BelongsTo
    {
        return $this->belongsTo(InsertStone::class);
    }
}
