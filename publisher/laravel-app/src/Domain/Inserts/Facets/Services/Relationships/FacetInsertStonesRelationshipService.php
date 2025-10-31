<?php

declare(strict_types=1);

namespace Domain\Inserts\Facets\Services\Relationships;

use Domain\Inserts\Facets\Repositories\Relationships\FacetInsertStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class FacetInsertStonesRelationshipService
{
    public function __construct(public FacetInsertStonesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}