<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;

final class NaturalStonesStoneGroupRelationshipRepository
{
    public function index(int $id): StoneGroup|null
    {
        return NaturalStone::findOrFail($id)->stoneGroup;
    }
}
