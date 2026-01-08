<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Repositories\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;

final class OpticalEffectStonesOpticalEffectRelationshipRepository
{
    public function index(int $id): OpticalEffect
    {
        return StoneOpticalEffect::findOrFail($id)->opticalEffect;
    }
}
