<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Repositories\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;

final class StoneGradeNaturalStoneGradesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneGrade::findOrFail($id)->naturalStoneGrades;
    }
}
