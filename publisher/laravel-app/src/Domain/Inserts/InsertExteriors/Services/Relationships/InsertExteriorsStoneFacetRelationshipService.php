<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Services\Relationships;

use Domain\Inserts\Facets\Models\Facet;
use Domain\Inserts\InsertExteriors\Repositories\Relationships\InsertExteriorsFacetRelationshipRepository;

final class InsertExteriorsStoneFacetRelationshipService
{
    public function __construct(public InsertExteriorsFacetRelationshipRepository $repository)
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