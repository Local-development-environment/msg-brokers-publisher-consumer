<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\ImitationStones\Models\ImitationStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneImitationStoneRelationshipRepository
{
    public function index(int $id): ImitationStone|null
    {
        return Stone::findOrFail($id)->imitationStone;
    }
}
