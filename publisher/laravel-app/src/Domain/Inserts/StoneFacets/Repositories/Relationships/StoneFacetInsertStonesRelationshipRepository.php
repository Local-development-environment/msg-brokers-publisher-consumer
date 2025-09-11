<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFacets\Repositories\Relationships;

use Domain\Inserts\StoneFacets\Models\StoneFacet;
use Illuminate\Database\Eloquent\Collection;

final class StoneFacetInsertStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneFacet::find($id)->insertStones;
    }
}