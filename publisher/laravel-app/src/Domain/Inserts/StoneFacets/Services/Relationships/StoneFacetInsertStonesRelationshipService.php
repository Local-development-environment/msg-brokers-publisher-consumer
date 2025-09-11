<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneFacets\Services\Relationships;

use Domain\Inserts\StoneFacets\Repositories\Relationships\StoneFacetInsertStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneFacetInsertStonesRelationshipService
{
    public function __construct(public StoneFacetInsertStonesRelationshipRepository $repository)
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