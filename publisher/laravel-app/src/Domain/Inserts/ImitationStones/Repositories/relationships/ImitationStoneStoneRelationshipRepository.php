<?php

declare(strict_types=1);

namespace Domain\Inserts\ImitationStones\Repositories\relationships;

use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\Stones\Models\Stone;

final class ImitationStoneStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return ImitationStone::findOrFail($id)->stone;
    }
}