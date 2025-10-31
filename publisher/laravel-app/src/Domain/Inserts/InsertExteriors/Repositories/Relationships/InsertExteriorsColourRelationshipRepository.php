<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Repositories\Relationships;

use Domain\Inserts\Colours\Models\Colour;
use Domain\Inserts\InsertExteriors\Models\InsertExterior;

final class InsertExteriorsColourRelationshipRepository
{
    public function index(int $id): Colour
    {
        return InsertExterior::find($id)->insertColour;
    }
}