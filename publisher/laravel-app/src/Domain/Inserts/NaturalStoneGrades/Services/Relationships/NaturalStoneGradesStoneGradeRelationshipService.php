<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Services\Relationships;

use Domain\Inserts\NaturalStoneGrades\Repositories\Relationships\NaturalStoneGradesStoneGradeRelationshipRepository;
use Domain\Inserts\StoneGrades\Models\StoneGrade;

final class NaturalStoneGradesStoneGradeRelationshipService
{
    public function __construct(public NaturalStoneGradesStoneGradeRelationshipRepository $repository)
    {
    }

    public function index($id): StoneGrade
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}