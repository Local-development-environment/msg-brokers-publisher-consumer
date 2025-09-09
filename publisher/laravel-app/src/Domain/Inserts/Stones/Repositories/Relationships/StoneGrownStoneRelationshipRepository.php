<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Repositories\Relationships;

use Domain\Inserts\GrownStones\Models\GrownStone;
use Domain\Inserts\Stones\Models\Stone;

final class StoneGrownStoneRelationshipRepository
{
    public function index(int $id): GrownStone
    {
        return Stone::find($id)->grownStone;
    }
}