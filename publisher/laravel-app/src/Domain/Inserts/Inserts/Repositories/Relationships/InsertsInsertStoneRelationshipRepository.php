<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Repositories\Relationships;

use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Domain\Inserts\Inserts\Models\Insert;

final class InsertsInsertStoneRelationshipRepository
{
    public function index(int $id): InsertExterior
    {
        return Insert::findOrFail($id)->insertStone;
    }
}