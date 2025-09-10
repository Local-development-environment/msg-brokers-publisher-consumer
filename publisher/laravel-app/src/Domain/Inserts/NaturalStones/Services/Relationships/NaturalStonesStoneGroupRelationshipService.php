<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Services\Relationships;

use Domain\Inserts\NaturalStones\Repositories\Relationships\NaturalStonesStoneGroupRelationshipRepository;
use Domain\Inserts\StoneGroups\Models\StoneGroup;

final class NaturalStonesStoneGroupRelationshipService
{
    public function __construct(public NaturalStonesStoneGroupRelationshipRepository $repository)
    {
    }

    public function index($id): StoneGroup|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}