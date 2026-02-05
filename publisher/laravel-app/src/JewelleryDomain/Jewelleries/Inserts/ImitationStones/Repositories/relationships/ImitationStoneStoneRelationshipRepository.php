<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\ImitationStones\Repositories\relationships;

use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class ImitationStoneStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return ImitationStone::findOrFail($id)->stone;
    }
}
