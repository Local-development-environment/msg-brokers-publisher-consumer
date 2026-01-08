<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffectStones\Repositories\Relationships;

use Domain\Inserts\OpticalEffectStones\Models\StoneOpticalEffect;
use Domain\Inserts\Stones\Models\Stone;

final class OpticalEffectStoneStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return StoneOpticalEffect::findOrFail($id)->stone;
    }
}
