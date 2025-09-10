<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGroups\Services\Relationships;

use Domain\Inserts\StoneGroups\Repositories\Relationships\StoneGroupNaturalStonesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneGroupNaturalStonesRelationshipService
{
    public function __construct(public StoneGroupNaturalStonesRelationshipRepository $repository)
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