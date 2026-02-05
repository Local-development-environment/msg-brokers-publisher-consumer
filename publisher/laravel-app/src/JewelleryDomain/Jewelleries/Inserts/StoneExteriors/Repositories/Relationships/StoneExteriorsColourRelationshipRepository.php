<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\StoneColours\Models\StoneColour;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneExteriorsColourRelationshipRepository
{
    public function index(int $id): StoneColour
    {
        return StoneExterior::find($id)->insertColour;
    }
}
