<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Repositories\Relationships;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\StoneGrades\Models\StoneGrade;

final class NaturalStoneGradesStoneGradeRelationshipRepository
{
    public function index(int $id): StoneGrade
    {
        return NaturalStoneGrade::find($id)->stoneGrade;
    }
}