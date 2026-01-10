<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\Rings\Models;

use Domain\Jewelleries\Jewelleries\Models\Jewellery;
use Domain\JewelleryProperties\Rings\RingDetails\Models\RingDetail;
use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Domain\JewelleryProperties\Rings\RingMetrics\Models\RingMetric;
use Domain\JewelleryProperties\Rings\Rings\Enums\RingEnum;
use Domain\JewelleryProperties\Rings\RingSizes\Models\RingSize;
use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class Ring extends Model
{
    protected $table = RingEnum::TABLE_NAME->value;
    protected $fillable = ['ring_finger_id', 'dimensions'];

    public const string TYPE_RESOURCE = RingEnum::TYPE_RESOURCE->value;

    public function jewellery(): BelongsTo
    {
        return $this->belongsTo(Jewellery::class, 'id');
    }

    public function ringFinger(): BelongsTo
    {
        return $this->belongsTo(RingFinger::class, 'id');
    }

    public function ringDetails(): HasMany
    {
        return $this->hasMany(RingDetail::class, 'id');
    }

    public function ringMetrics(): HasMany
    {
        return $this->hasMany(RingMetric::class, 'id');
    }

    public function ringTypes(): BelongsToMany
    {
        return $this->belongsToMany(RingType::class, 'id');
    }

    public function ringSizes(): BelongsToMany
    {
        return $this->belongsToMany(RingSize::class, 'id');
    }
}
