<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Repositories\Relationships;

use Domain\Inserts\ImitationStones\Models\ImitationStone;
use Domain\Inserts\Stones\Models\Stone;

final class StoneImitationStoneRelationshipRepository
{
    public function index(int $id): ImitationStone|null
    {
        return Stone::find($id)->imitationStone;
    }
}