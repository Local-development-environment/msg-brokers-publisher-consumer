<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Models\Insert;

final class InsertsStoneExteriorRelationshipRepository
{
    public function index(int $id): StoneExterior
    {
        return Insert::findOrFail($id)->stoneExterior;
    }
}
