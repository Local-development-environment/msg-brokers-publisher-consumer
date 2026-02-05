<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class NaturalStoneStoneRelationshipRepository
{
    public function index(int $id): Stone|null
    {
        return NaturalStone::findOrFail($id)->stone;
    }
}
