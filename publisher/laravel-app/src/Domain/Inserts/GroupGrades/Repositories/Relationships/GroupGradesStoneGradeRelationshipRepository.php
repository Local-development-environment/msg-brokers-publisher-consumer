<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Repositories\Relationships;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\StoneGrades\Models\StoneGrade;

final class GroupGradesStoneGradeRelationshipRepository
{
    public function index(int $id): StoneGrade
    {
        return GroupGrade::findOrFail($id)->stoneGrade;
    }
}