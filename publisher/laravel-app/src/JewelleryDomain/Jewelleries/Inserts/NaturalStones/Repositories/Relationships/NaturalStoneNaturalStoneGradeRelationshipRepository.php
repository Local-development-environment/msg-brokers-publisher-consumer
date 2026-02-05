<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;

final class NaturalStoneNaturalStoneGradeRelationshipRepository
{
    public function index(int $id): GroupGrade|null
    {
        return NaturalStone::findOrFail($id)->naturalStoneGrade;
    }
}
