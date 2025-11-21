<?php

declare(strict_types=1);

namespace Domain\Inserts\NaturalStones\Repositories\Relationships;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class NaturalStoneNaturalStoneGradeRelationshipRepository
{
    public function index(int $id): GroupGrade|null
    {
        return NaturalStone::findOrFail($id)->naturalStoneGrade;
    }
}