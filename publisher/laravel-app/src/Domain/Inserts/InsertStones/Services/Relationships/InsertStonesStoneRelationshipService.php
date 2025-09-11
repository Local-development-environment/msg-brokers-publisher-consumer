<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertStones\Services\Relationships;

use Domain\Inserts\InsertStones\Repositories\Relationships\InsertStonesStoneRelationshipRepository;
use Domain\Inserts\Stones\Models\Stone;

final class InsertStonesStoneRelationshipService
{
    public function __construct(public InsertStonesStoneRelationshipRepository $repository)
    {
    }

    public function index($id): Stone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}