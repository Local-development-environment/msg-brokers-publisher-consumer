<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Models\StoneExterior;

final class StoneExteriorsFacetRelationshipRepository
{
    public function index(int $id): Facet
    {
        return StoneExterior::find($id)->facet;
    }}
