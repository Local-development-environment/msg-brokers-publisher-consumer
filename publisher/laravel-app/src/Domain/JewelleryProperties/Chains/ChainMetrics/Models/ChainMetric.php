<?php

namespace Domain\JewelleryProperties\Chains\ChainMetrics\Models;

use Domain\JewelleryProperties\Chains\ChainMetrics\Enums\ChainMetricEnum;
use Domain\JewelleryProperties\Chains\Chains\Models\Chain;
use Domain\Shared\JewelleryProperties\NeckSizes\Models\NeckSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChainMetric extends Model
{
    protected $table = ChainMetricEnum::TABLE_NAME->value;
    protected $fillable = ['neck_size_id', 'necklace_id', 'quantity', 'price'];

    public const string TYPE_RESOURCE = ChainMetricEnum::TYPE_RESOURCE->value;

    public function neckSize(): BelongsTo
    {
        return $this->belongsTo(NeckSize::class);
    }

    public function necklace(): BelongsTo
    {
        return $this->belongsTo(Chain::class);
    }
}
