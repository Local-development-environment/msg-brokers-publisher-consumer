<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Repositories\Relationships;

use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneExteriorsFacetRelationshipRepository
{
    public function index(int $id): Facet
    {
        return StoneExterior::find($id)->facet;
    }}
