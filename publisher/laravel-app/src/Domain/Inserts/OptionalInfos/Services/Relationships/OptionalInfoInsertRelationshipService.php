<?php

declare(strict_types=1);

namespace Domain\Inserts\OptionalInfos\Services\Relationships;

use Domain\Inserts\Inserts\Models\Insert;
use Domain\Inserts\OptionalInfos\Repositories\Relationships\OptionalInfoInsertRelationshipRepository;

final class OptionalInfoInsertRelationshipService
{
    public function __construct(public OptionalInfoInsertRelationshipRepository $repository)
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