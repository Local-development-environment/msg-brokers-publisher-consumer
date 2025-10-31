<?php

declare(strict_types=1);

namespace Domain\Inserts\Facets\Repositories\Relationships;

use Domain\Inserts\Facets\Models\Facet;
use Illuminate\Database\Eloquent\Collection;

final class FacetInsertStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Facet::find($id)->insertExteriors;
    }
}