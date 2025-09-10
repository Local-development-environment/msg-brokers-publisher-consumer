<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Repositories\Relationships;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\StoneFamilies\Models\StoneFamily;

final class NaturalStonesStoneFamilyRelationshipRepository
{
    public function index(int $id): StoneFamily|null
    {
        return NaturalStone::findOrFail($id)->stoneFamily;
    }
}