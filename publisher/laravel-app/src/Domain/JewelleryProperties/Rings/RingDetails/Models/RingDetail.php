<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingDetails\Models;

use Domain\JewelleryProperties\Rings\RingDetails\Enums\RingDetailEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Domain\JewelleryProperties\Rings\RingTypes\Models\RingType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
