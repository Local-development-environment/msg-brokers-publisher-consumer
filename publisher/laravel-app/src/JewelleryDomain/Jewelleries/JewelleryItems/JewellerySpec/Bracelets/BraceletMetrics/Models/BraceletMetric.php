<?php
declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Enums\BraceletMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Models\Bracelet;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Models\BraceletSize;

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
