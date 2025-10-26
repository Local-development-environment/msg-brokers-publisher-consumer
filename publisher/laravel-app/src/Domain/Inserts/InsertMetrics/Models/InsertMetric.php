<?php
declare(strict_types=1);

namespace Domain\Inserts\InsertMetrics\Models;

use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
use Domain\Inserts\Inserts\Enums\InsertEnum;
use Domain\Inserts\Inserts\Models\Insert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

final class InsertMetric extends Model
{
    protected $table = InsertMetricEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = InsertMetricEnum::TYPE_RESOURCE->value;

    public function insert(): HasOne
    {
        return $this->hasOne(Insert::class, InsertEnum::PRIMARY_KEY->value);
    }
}
