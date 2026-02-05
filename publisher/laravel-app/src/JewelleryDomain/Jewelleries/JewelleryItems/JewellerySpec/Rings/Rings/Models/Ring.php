<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models;

use Domain\JewelleryProperties\Rings\RingFingers\Models\RingFinger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\JewelleryItems\JewelleryProperties\Models\Jewellery;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Models\RingDetail;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingMetrics\Models\RingMetric;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Enums\RingEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingSizes\Models\RingSize;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Models\RingType;

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
