<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models\Ring;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Models\RingSize;

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
