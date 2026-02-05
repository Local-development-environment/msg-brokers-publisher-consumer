<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneNaturalStoneRelationshipRepository
{
    public function index(int $id): NaturalStone|null
    {
        return Stone::findOrFail($id)->naturalStone;
    }
}
