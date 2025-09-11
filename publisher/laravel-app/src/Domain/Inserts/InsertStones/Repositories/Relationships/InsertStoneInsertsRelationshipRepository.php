<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Repositories\Relationships;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Illuminate\Database\Eloquent\Collection;

final class InsertStoneInsertsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return InsertStone::find($id)->inserts;
    }
}