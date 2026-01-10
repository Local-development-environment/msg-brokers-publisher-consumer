<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingMetrics\Models;

use Domain\JewelleryProperties\Rings\RingMetrics\Enums\RingMetricEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\Rings\RingSizes\Models\RingSize;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class RingMetric extends Model
{
    protected $table = RingMetricEnum::TABLE_NAME->value;
    protected $fillable = ['ring_id', 'ring_size_id','quantity', 'price'];

    public const string TYPE_RESOURCE = RingMetricEnum::TYPE_RESOURCE->value;

    public function ring(): BelongsTo
    {
        return $this->belongsTo(Ring::class, 'id');
    }

    public function ringSize(): BelongsTo
    {
        return $this->belongsTo(RingSize::class, 'id');
    }
}
