<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Services\Relationships;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStones\Repositories\Relationships\NaturalStoneNaturalStoneGradeRelationshipRepository;

final class NaturalStoneNaturalStoneGradeRelationshipService
{
    public function __construct(public NaturalStoneNaturalStoneGradeRelationshipRepository $repository)
    {
    }

    public function index($id): NaturalStoneGrade|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}