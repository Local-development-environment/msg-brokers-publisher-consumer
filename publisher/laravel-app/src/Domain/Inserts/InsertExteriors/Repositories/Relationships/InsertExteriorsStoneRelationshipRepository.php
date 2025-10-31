<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Repositories\Relationships;

use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Domain\Inserts\Stones\Models\Stone;

final class InsertExteriorsStoneRelationshipRepository
{
    public function index(int $id): Stone
    {
        return InsertExterior::find($id)->stone;
    }
}