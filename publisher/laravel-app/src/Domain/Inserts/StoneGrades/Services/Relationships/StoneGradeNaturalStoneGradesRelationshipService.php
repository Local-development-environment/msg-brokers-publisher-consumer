<?php

declare(strict_types=1);

namespace Domain\Inserts\StoneGrades\Services\Relationships;

use Domain\Inserts\StoneGrades\Models\StoneGrade;
use Domain\Inserts\StoneGrades\Repositories\Relationships\StoneGradeNaturalStoneGradesRelationshipRepository;
use Illuminate\Database\Eloquent\Collection;

final class StoneGradeNaturalStoneGradesRelationshipService
{
    public function __construct(public StoneGradeNaturalStoneGradesRelationshipRepository $repository)
    {
    }

    public function index($id): Collection
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}