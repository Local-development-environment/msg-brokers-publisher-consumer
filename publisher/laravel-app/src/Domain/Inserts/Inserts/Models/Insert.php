<?php
declare(strict_types=1);

namespace Domain\Inserts\Inserts\Models;

use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\InsertOptionalInfos\Enums\InsertOptionalInfoEnum;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;
use Domain\Inserts\StoneMetrics\Enums\StoneMetricEnum;
use Domain\Inserts\StoneMetrics\Models\StoneMetric;
use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class Insert extends Model
{
    protected $table = InsertEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class);
    }

    public function stoneMetric(): BelongsTo
    {
        return $this->belongsTo(StoneMetric::class, StoneMetricEnum::PRIMARY_KEY->value);
    }

    public function insertOptionalInfo(): HasOne
    {
        return $this->hasOne(InsertOptionalInfo::class, InsertOptionalInfoEnum::PRIMARY_KEY->value);
    }

    public function insertStone(): BelongsTo
    {
        return $this->belongsTo(InsertStone::class);
    }
}
