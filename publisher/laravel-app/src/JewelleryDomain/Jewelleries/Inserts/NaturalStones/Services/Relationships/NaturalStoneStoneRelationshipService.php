<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Repositories\Relationships\NaturalStoneStoneRelationshipRepository;
use JewelleryDomain\Jewelleries\Inserts\Stones\Models\Stone;

final class NaturalStoneStoneRelationshipService
{
    public function __construct(public NaturalStoneStoneRelationshipRepository $repository)
    {
    }

    public function index($id): Stone|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
