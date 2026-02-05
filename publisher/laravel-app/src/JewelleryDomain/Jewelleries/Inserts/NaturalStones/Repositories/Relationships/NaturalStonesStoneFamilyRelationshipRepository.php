<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

final class NaturalStonesStoneFamilyRelationshipRepository
{
    public function index(int $id): StoneFamily|null
    {
        return NaturalStone::findOrFail($id)->stoneFamily;
    }
}
