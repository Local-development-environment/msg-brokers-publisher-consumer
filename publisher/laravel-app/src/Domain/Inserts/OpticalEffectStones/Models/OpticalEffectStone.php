<?php

namespace Domain\Inserts\OpticalEffectStones\Models;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffectStones\Enums\OpticalEffectStoneEnum;
use Domain\Inserts\Stones\Models\Stone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpticalEffectStone extends Model
{
    protected $table = OpticalEffectStoneEnum::TABLE->value;

    public const string TYPE_RESOURCE = OpticalEffectStoneEnum::RESOURCE->value;

    public function opticalEffect(): BelongsTo
    {
        return $this->belongsTo(OpticalEffect::class);
    }

    public function stone(): BelongsTo
    {
        return $this->belongsTo(Stone::class);
    }
}
