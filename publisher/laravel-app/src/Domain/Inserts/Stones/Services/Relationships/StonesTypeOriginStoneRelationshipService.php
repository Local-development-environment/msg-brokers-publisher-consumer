<?php

declare(strict_types=1);

namespace Domain\Inserts\Stones\Services\Relationships;

use Domain\Inserts\Stones\Repositories\Relationships\StonesTypeOriginStoneRelationshipRepository;
use Domain\Inserts\TypeOrigins\Models\TypeOrigin;

final class StonesTypeOriginStoneRelationshipService
{
    public function __construct(public StonesTypeOriginStoneRelationshipRepository $repository)
    {
    }

    public function index($id): TypeOrigin
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}