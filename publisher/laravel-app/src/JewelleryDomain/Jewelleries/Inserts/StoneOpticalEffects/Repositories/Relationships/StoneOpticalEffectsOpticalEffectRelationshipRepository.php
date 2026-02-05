<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Repositories\Relationships;

use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Models\OpticalEffect;

final class StoneOpticalEffectsOpticalEffectRelationshipRepository
{
    public function index(int $id): OpticalEffect
    {
        return StoneOpticalEffect::findOrFail($id)->opticalEffect;
    }
}
