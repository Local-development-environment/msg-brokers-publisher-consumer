<?php
declare(strict_types=1);

namespace Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Models;

use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Enums\NecklaceMetricEnum;
use Domain\JewelleryProperties\Necklaces\Necklaces\Models\Necklace;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class NecklaceMetric extends Model
{
    protected $table = NecklaceMetricEnum::TABLE_NAME->value;
    protected $fillable = ['neck_size_id', 'necklace_id', 'quantity', 'price'];

    public const string TYPE_RESOURCE = NecklaceMetricEnum::TYPE_RESOURCE->value;

    public function neckSize(): BelongsTo
    {
        return $this->belongsTo(NeckSize::class);
    }

    public function necklace(): BelongsTo
    {
        return $this->belongsTo(Necklace::class);
    }
}
