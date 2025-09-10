<?php

declare(strict_types=1);

namespace Domain\Inserts\GrownStones\Repositories\Relationships;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;

final class GrownStonesStoneFamilyRelationshipRepository
{
    public function index(int $id): StoneFamily
    {
        return GrownStone::findOrFail($id)->stoneFamily;
    }
}