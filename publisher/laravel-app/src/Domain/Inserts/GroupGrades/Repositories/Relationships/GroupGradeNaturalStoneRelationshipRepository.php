<?php

declare(strict_types=1);

namespace Domain\Inserts\GroupGrades\Repositories\Relationships;

use Domain\Inserts\GroupGrades\Models\GroupGrade;
use Domain\Inserts\NaturalStones\Models\NaturalStone;

final class GroupGradeNaturalStoneRelationshipRepository
{
    public function index(int $id): NaturalStone
    {
        return GroupGrade::findOrFail($id)->naturalStone;
    }
}