<?php

declare(strict_types=1);

namespace Domain\Inserts\OpticalEffects\Repositories\Relationships;

use Domain\Inserts\OpticalEffects\Models\OpticalEffect;
use Illuminate\Database\Eloquent\Collection;

final class OpticalEffectOpticalEffectStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return OpticalEffect::findOrFail($id)->opticalEffectStones;
    }
}