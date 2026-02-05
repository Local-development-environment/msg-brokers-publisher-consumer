<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Repositories\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;

final class GroupGradesStoneGradeRelationshipRepository
{
    public function index(int $id): StoneGrade
    {
        return GroupGrade::findOrFail($id)->stoneGrade;
    }
}
