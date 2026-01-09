<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Repositories\Relationships;

use Domain\Inserts\StoneOpticalEffects\Models\StoneOpticalEffect;
use Domain\Inserts\Stones\Models\Stone;

final class StoneStoneOpticalEffectRelationshipRepository
{
    public function index(int $id): StoneOpticalEffect|null
    {
        return Stone::findOrFail($id)->stoneOpticalEffect;
    }
}
