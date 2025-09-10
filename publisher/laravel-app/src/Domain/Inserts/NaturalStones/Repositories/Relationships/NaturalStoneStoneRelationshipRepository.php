<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Repositories\Relationships;

use Domain\Inserts\NaturalStones\Models\NaturalStone;
use Domain\Inserts\Stones\Models\Stone;

final class NaturalStoneStoneRelationshipRepository
{
    public function index(int $id): Stone|null
    {
        return NaturalStone::findOrFail($id)->stone;
    }
}