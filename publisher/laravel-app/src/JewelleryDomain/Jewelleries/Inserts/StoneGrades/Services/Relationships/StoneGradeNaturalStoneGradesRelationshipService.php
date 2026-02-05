<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\StoneGrades\Services\Relationships;

use Illuminate\Database\Eloquent\Collection;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Repositories\Relationships\StoneGradeNaturalStoneGradesRelationshipRepository;

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
