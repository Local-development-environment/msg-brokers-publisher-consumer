<?php

declare(strict_types=1);

namespace Domain\JewelleryProperties\Rings\RingFingers\Models;

use Domain\JewelleryProperties\Rings\RingFingers\Enums\RingFingerEnum;
use Domain\JewelleryProperties\Rings\Rings\Models\Ring;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class RingFinger extends Model
{
    protected $table = RingFingerEnum::TABLE_NAME->value;
    protected $fillable = ['name', 'slug'];

    public const string TYPE_RESOURCE = RingFingerEnum::TYPE_RESOURCE->value;

    public function rings(): HasMany
    {
        return $this->hasMany(Ring::class);
    }
}
