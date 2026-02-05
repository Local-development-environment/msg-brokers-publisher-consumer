<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Facets\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;

final class FacetInsertStonesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return Facet::find($id)->insertExteriors;
    }
}
