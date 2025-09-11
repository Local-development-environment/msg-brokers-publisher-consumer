<?php

declare(strict_types=1);

namespace Domain\Inserts\Inserts\Services\Relationships;

use Domain\Inserts\Inserts\Repositories\Relationships\InsertOptionalInfoRelationshipRepository;
use Domain\Inserts\OptionalInfos\Models\OptionalInfo;

final class InsertOptionalInfoRelationshipService
{
    public function __construct(public InsertOptionalInfoRelationshipRepository $repository)
    {
    }

    public function index($id): OptionalInfo
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}