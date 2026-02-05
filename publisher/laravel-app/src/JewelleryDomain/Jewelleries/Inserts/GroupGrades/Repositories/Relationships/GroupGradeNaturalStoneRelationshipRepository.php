<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;

final class GroupGradeNaturalStoneRelationshipRepository
{
    public function index(int $id): NaturalStone
    {
        return GroupGrade::findOrFail($id)->naturalStone;
    }
}
