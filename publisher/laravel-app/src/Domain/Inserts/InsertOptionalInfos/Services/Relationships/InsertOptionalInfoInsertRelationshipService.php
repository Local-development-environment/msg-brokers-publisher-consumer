<?php

declare(strict_types=1);

namespace Domain\Inserts\InsertOptionalInfos\Services\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\InsertOptionalInfos\Repositories\Relationships\InsertOptionalInfoInsertRelationshipRepository;

final class InsertOptionalInfoInsertRelationshipService
{
    public function __construct(public InsertOptionalInfoInsertRelationshipRepository $repository)
    {
    }

    public function index($id): Insert
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}