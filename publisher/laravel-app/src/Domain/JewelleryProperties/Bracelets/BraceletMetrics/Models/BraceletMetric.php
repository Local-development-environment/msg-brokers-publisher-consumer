<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Bracelets\BraceletMetrics\Models;

use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use Domain\JewelleryProperties\Bracelets\Bracelets\Models\Bracelet;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Models\BraceletSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class BraceletMetric extends Model
{
    protected $table = BraceletMetricEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = BraceletMetricEnum::TYPE_RESOURCE->value;

    public function braceletSize(): BelongsTo
    {
        return $this->belongsTo(BraceletSize::class);
    }

    public function bracelet(): BelongsTo
    {
        return $this->belongsTo(Bracelet::class);
    }
}
