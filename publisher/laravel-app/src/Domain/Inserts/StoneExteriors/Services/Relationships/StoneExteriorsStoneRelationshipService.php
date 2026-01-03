<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneExteriors\Services\Relationships;

use Domain\Inserts\StoneExteriors\Repositories\Relationships\StoneExteriorsStoneRelationshipRepository;
use Domain\Inserts\Stones\Models\Stone;

final class StoneExteriorsStoneRelationshipService
{
    public function __construct(public StoneExteriorsStoneRelationshipRepository $repository)
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
