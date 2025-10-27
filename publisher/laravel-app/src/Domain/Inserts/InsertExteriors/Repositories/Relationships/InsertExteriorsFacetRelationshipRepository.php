<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Repositories\Relationships;

use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\InsertExteriors\Models\InsertExterior;

final class InsertExteriorsFacetRelationshipRepository
{
    public function index(int $id): Facet
    {
        return InsertExterior::find($id)->facet;
    }}