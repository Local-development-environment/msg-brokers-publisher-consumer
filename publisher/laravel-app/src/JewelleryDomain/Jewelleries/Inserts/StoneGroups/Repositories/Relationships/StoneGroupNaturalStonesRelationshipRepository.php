<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGroups\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;

final class StoneGroupNaturalStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneGroup::findOrFail($id)->naturalStones;
    }
}
