<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Repositories\Relationships;

use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneOpticalEffectStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return StoneOpticalEffect::findOrFail($id)->stone;
    }
}
