<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GroupGrades\Models\GroupGrade;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships\NaturalStoneNaturalStoneGradeRelationshipRepository;

final class NaturalStoneNaturalStoneGradeRelationshipService
{
    public function __construct(public NaturalStoneNaturalStoneGradeRelationshipRepository $repository)
    {
    }

    public function index($id): GroupGrade|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
