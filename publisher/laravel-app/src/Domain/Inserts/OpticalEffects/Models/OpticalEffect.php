<?php

namespace Domain\Inserts\OpticalEffects\Models;

use Domain\Inserts\OpticalEffects\Enums\OpticalEffectEnum;
use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OpticalEffect extends Model
{
    protected $table = OpticalEffectEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = OpticalEffectEnum::TYPE_RESOURCE->value;

    public function opticalEffectStones(): HasMany
    {
        return $this->hasMany(OpticalEffectStone::class);
    }
}
