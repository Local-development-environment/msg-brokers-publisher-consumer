<?php

namespace JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Models;

use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Enums\OpticalEffectEnum;

class OpticalEffect extends Model
{
    protected $table = OpticalEffectEnum::TABLE_NAME->value;

    public const string TYPE_RESOURCE = OpticalEffectEnum::TYPE_RESOURCE->value;

    public function opticalEffectStones(): HasMany
    {
        return $this->hasMany(StoneOpticalEffect::class);
    }
}
