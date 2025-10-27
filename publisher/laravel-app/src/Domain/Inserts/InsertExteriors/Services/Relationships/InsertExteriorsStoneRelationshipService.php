<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertExteriors\Services\Relationships;

use Domain\Inserts\InsertExteriors\Repositories\Relationships\InsertExteriorsStoneRelationshipRepository;
use Domain\Inserts\Stones\Models\Stone;

final class InsertExteriorsStoneRelationshipService
{
    public function __construct(public InsertExteriorsStoneRelationshipRepository $repository)
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