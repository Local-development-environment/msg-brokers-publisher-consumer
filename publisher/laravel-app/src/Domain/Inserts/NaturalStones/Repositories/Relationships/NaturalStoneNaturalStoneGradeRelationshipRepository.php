<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Repositories\Relationships;

use Domain\Inserts\NaturalStoneGrades\Models\NaturalStoneGrade;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class NaturalStoneNaturalStoneGradeRelationshipRepository
{
    public function index(int $id): NaturalStoneGrade|null
    {
        return NaturalStone::findOrFail($id)->naturalStoneGrade;
    }
}