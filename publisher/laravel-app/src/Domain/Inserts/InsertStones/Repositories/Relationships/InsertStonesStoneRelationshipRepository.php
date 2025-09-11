<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Repositories\Relationships;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\Stones\Models\Stone;

final class InsertStonesStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return InsertStone::find($id)->stone;
    }
}