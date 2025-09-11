<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Repositories\Relationships;

use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\StoneFacets\Models\StoneFacet;

final class InsertStonesStoneFacetRelationshipRepository
{
    public function index(int $id): StoneFacet
    {
        return InsertStone::find($id)->stoneFacet;
    }}