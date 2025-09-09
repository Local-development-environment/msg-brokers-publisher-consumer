<?php

declare(strict_types=1);

namespace Domain\Inserts\GrownStones\Repositories\Relationships;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\Stones\Models\Stone;

final class GrownStoneStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return GrownStone::find($id)->stone;
    }
}