<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Services\Relationships;

use Domain\Inserts\InsertStones\Repositories\Relationships\InsertStonesStoneFacetRelationshipRepository;
use Domain\Inserts\StoneFacets\Models\StoneFacet;

final class InsertStonesStoneFacetRelationshipService
{
    public function __construct(public InsertStonesStoneFacetRelationshipRepository $repository)
    {
    }

    public function index($id): StoneFacet
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}