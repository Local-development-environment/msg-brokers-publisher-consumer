<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Repositories\Relationships;

use Domain\Inserts\StoneExteriours\Models\StoneExterior;
use Illuminate\Database\Eloquent\Collection;

final class StoneExteriorInsertsRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneExterior::find($id)->inserts;
    }
}