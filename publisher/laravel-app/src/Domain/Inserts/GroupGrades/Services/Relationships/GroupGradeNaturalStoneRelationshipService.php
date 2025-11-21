<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Services\Relationships;

use Domain\Inserts\GroupGrades\Repositories\Relationships\GroupGradeNaturalStoneRelationshipRepository;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class GroupGradeNaturalStoneRelationshipService
{
    public function __construct(public GroupGradeNaturalStoneRelationshipRepository $repository)
    {
    }

    public function index($id): NaturalStone
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}