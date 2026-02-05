<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Models\GrownStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneGrownStoneRelationshipRepository
{
    public function index(int $id): GrownStone|null
    {
        return Stone::findOrFail($id)->grownStone;
    }
}
