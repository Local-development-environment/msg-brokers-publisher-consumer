<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneStoneOpticalEffectRelationshipRepository
{
    public function index(int $id): StoneOpticalEffect|null
    {
        return Stone::findOrFail($id)->stoneOpticalEffect;
    }
}
