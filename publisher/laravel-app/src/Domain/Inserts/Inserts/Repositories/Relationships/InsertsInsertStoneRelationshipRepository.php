<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\InsertStones\Models\InsertStone;

final class InsertsInsertStoneRelationshipRepository
{
    public function index(int $id): InsertStone
    {
        return Insert::findOrFail($id)->optionalInfo;
    }
}