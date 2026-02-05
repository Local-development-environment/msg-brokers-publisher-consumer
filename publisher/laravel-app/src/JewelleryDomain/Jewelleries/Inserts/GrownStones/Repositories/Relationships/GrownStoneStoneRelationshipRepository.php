<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class GrownStoneStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return GrownStone::findOrFail($id)->stone;
    }
}
