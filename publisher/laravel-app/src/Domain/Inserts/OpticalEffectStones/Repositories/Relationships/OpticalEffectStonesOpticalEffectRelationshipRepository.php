<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Repositories\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffectStones\Models\OpticalEffectStone;

final class OpticalEffectStonesOpticalEffectRelationshipRepository
{
    public function index(int $id): OpticalEffect
    {
        return OpticalEffectStone::findOrFail($id)->opticalEffect;
    }
}