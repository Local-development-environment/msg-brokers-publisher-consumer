<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Models\OpticalEffect;

final class OpticalEffectOpticalEffectStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return OpticalEffect::findOrFail($id)->opticalEffectStones;
    }
}
