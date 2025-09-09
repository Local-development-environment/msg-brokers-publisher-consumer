<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Services\Relationships;

use Domain\Inserts\NaturalStoneGrades\Repositories\Relationships\NaturalStoneGradeNaturalStoneRelationshipRepository;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class NaturalStoneGradeNaturalStoneRelationshipService
{
    public function __construct(public NaturalStoneGradeNaturalStoneRelationshipRepository $repository)
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