<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStoneGrades\Repositories\Relationships;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class NaturalStoneGradeNaturalStoneRelationshipRepository
{
    public function index(int $id): NaturalStone
    {
        return NaturalStoneGrade::find($id)->naturalStone;
    }
}