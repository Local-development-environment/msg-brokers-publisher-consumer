<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriours\Services\Relationships;

use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\StoneExteriours\Repositories\Relationships\StoneExteriorsFacetRelationshipRepository;

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