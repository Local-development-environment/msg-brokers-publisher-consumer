<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingDetails\Enums\RingDetailEnum;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\Rings\Models\Ring;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Rings\RingTypes\Models\RingType;

final class RingDetail extends Model
{
    protected $table = RingDetailEnum::TABLE_NAME->value;
    protected $fillable = ['ring_id', 'ring_type_id'];

    public const string TYPE_RESOURCE = RingDetailEnum::TYPE_RESOURCE->value;

    public function ring(): BelongsTo
    {
        return $this->belongsTo(Ring::class, 'id');
    }

    public function ringType(): BelongsTo
    {
        return $this->belongsTo(RingType::class, 'id');
    }
}
