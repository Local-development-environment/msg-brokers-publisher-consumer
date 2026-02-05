<?php

declare(strict_types=1);

namespace JewelleryDomain\Jewelleries\Inserts\Stones\Services\Relationships;

use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Models\NaturalStone;
use JewelleryDomain\Jewelleries\Inserts\Stones\Repositories\Relationships\StoneNaturalStoneRelationshipRepository;

final class StoneNaturalStoneRelationshipService
{
    public function __construct(public StoneNaturalStoneRelationshipRepository $repository)
    {
    }

    public function index($id): NaturalStone|null
    {
        return $this->repository->index($id);
    }

    public function update($data, $id): void
    {
        $this->repository->update($data, $id);
    }
}
