<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships\NaturalStonesStoneFamilyRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Models\StoneFamily;

final class NaturalStonesStoneFamilyRelationshipService
{
    public function __construct(public NaturalStonesStoneFamilyRelationshipRepository $repository)
    {
    }

    public function index($id): StoneFamily|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
