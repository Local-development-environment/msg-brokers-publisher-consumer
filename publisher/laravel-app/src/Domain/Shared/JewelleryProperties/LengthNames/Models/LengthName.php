<?php

namespace Domain\Shared\JewelleryProperties\LengthNames\Models;

use Domain\JewelleryProperties\Beads\BeadSizes\Models\BeadSize;
use Domain\Shared\JewelleryProperties\LengthNames\Enums\LengthNameEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LengthName extends Model
{
    protected $table = LengthNameEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = LengthNameEnum::TYPE_RESOURCE->value;

    public function beadSizes(): HasMany
    {
        return $this->hasMany(BeadSize::class);
    }
}
