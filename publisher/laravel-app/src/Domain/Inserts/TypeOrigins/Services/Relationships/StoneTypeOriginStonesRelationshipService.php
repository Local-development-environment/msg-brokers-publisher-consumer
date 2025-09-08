<?php

declare(strict_types=1);

namespace Domain\Inserts\TypeOrigins\Services\Relationships;

use Domain\Inserts\TypeOrigins\Repositories\Relationships\StoneTypeOriginStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneTypeOriginStonesRelationshipService
{
    public function __construct(public StoneTypeOriginStonesRelationshipRepository $repository)
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