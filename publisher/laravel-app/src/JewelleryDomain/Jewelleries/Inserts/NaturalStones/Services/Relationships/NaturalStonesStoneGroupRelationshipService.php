<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships\NaturalStonesStoneGroupRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Models\StoneGroup;

final class NaturalStonesStoneGroupRelationshipService
{
    public function __construct(public NaturalStonesStoneGroupRelationshipRepository $repository)
    {
    }

    public function index($id): StoneGroup|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
