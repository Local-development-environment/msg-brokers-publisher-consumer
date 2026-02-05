<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class StoneExteriorsStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return StoneExterior::find($id)->stone;
    }
}
