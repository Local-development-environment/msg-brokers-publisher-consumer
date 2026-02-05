<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\GrownStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\GrownStones\Repositories\Relationships\GrownStonesStoneFamilyRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

final class GrownStonesStoneFamilyRelationshipService
{
    public function __construct(public GrownStonesStoneFamilyRelationshipRepository $repository)
    {
    }

    public function index($id): StoneFamily
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
