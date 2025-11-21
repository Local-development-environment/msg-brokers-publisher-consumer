<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Services\Relationships;

use Domain\Inserts\GroupGrades\Repositories\Relationships\GroupGradesStoneGradeRelationshipRepository;
use Domain\Inserts\StoneGrades\Models\StoneGrade;

final class GroupGradesStoneGradeRelationshipService
{
    public function __construct(public GroupGradesStoneGradeRelationshipRepository $repository)
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