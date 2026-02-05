<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

final class GrownStonesStoneFamilyRelationshipRepository
{
    public function index(int $id): StoneFamily
    {
        return GrownStone::findOrFail($id)->stoneFamily;
    }
}
