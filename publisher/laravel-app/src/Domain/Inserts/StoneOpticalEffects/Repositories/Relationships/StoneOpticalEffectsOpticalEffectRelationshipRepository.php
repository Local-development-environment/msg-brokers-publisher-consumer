<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneOpticalEffects\Repositories\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;

final class StoneOpticalEffectsOpticalEffectRelationshipRepository
{
    public function index(int $id): OpticalEffect
    {
        return StoneOpticalEffect::findOrFail($id)->opticalEffect;
    }
}
