<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Enums\RingMetricEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Models\RingMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models\Ring;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Enums\RingSizeEnum;

final class RingSize extends Model
{
    protected $table = RingSizeEnum::TABLE_NAME->value;
    protected $fillable = ['value', 'unit'];

    public const string TYPE_RESOURCE = RingSizeEnum::TYPE_RESOURCE->value;

    public function rings(): BelongsToMany
    {
        return $this->belongsToMany(Ring::class, RingMetricEnum::TABLE_NAME->value);
    }

    public function ringMetrics(): HasMany
    {
        return $this->hasMany(RingMetric::class);
    }
}
