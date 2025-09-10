<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Repositories\Relationships;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneGroups\Models\StoneGroup;

final class NaturalStonesStoneGroupRelationshipRepository
{
    public function index(int $id): StoneGroup|null
    {
        return NaturalStone::findOrFail($id)->stoneGroup;
    }
}