<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Repositories\Relationships;

use Domain\Inserts\InsertExteriors\Models\InsertExterior;
use Illuminate\Database\Eloquent\Collection;

final class InsertExteriorInsertsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return InsertExterior::find($id)->inserts;
    }
}