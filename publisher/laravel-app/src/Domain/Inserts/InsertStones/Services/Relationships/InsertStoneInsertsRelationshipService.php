<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Services\Relationships;

use Domain\Inserts\InsertStones\Repositories\Relationships\InsertStoneInsertsRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class InsertStoneInsertsRelationshipService
{
    public function __construct(public InsertStoneInsertsRelationshipRepository $repository)
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