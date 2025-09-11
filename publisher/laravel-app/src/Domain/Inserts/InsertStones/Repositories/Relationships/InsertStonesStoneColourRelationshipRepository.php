<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Repositories\Relationships;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneColours\Models\StoneColour;

final class InsertStonesStoneColourRelationshipRepository
{
    public function index(int $id): StoneColour
    {
        return InsertStone::find($id)->stoneColour;
    }
}