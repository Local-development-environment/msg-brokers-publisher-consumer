<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GroupGrades\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Repositories\Relationships\GroupGradesStoneGradeRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Models\StoneGrade;

final class GroupGradesStoneGradeRelationshipService
{
    public function __construct(public GroupGradesStoneGradeRelationshipRepository $repository)
    {
    }

    public function index($id): StoneGrade
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
