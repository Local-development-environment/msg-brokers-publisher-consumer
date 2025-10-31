<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Services\Relationships;

use Domain\Inserts\InsertExteriors\Repositories\Relationships\InsertExteriorInsertsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class InsertExteriorInsertsRelationshipService
{
    public function __construct(public InsertExteriorInsertsRelationshipRepository $repository)
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