<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Repositories\Relationships;

use Domain\Inserts\Colours\Models\StoneColour;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneExteriorsColourRelationshipRepository
{
    public function index(int $id): StoneColour
    {
        return StoneExterior::find($id)->insertColour;
    }
}
