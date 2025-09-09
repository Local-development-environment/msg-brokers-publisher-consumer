<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Repositories\Relationships;

use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Illuminate\Database\Eloquent\Collection;

final class StoneGradeNaturalStoneGradesRelationshipRepository
{
    public function index(int $id): Collection
    {
        return StoneGrade::find($id)->naturalStoneGrade;
    }
}