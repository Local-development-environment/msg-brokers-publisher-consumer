<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\Facets\Models\Facet;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Repositories\Relationships\StoneExteriorsFacetRelationshipRepository;

final class StoneExteriorsStoneFacetRelationshipService
{
    public function __construct(public StoneExteriorsFacetRelationshipRepository $repository)
    {
    }

    public function index($id): Facet
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
