<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\Inserts\Repositories\Relationships\InsertInsertOptionalInfoRelationshipRepository;
use Domain\Inserts\InsertOptionalInfos\Models\InsertOptionalInfo;

final class InsertInsertOptionalInfoRelationshipService
{
    public function __construct(public InsertInsertOptionalInfoRelationshipRepository $repository)
    {
    }

    public function index($id): InsertOptionalInfo|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}